<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderFile;
use App\OrderStatus;
use App\ThemeCatagory;
use App\Type;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{

    public function order_view($order)
    {

        $order = Order::findOrFail($order);

        return view('orders.item', compact('order'));

    }

    public function orders()
    {

        $orders_sql = Order::where('status_id', 1)->orderby('created_at', 'desc');
        $data = request()->all();
        if (isset($data['price'])) {
            if ($data['name'] != '') {
                $orders_sql->where('name', 'LIKE', '%' . $data['name'] . '%');
            }
            if (is_numeric($data['type_id'])) {
                $orders_sql->where('type_id', $data['type_id']);
            }
            if (is_numeric($data['theme_id'])) {
                $orders_sql->where('theme_id', $data['type_id']);
            }
            if (is_numeric($data['amount_page'][0]) || is_numeric($data['amount_page'][1])) {
                if ($data['amount_page'][0] == '' && is_numeric($data['amount_page'][1])) {
                    $orders_sql->where('amount_page', '<=', $data['amount_page']);
                }
                if ($data['amount_page'][1] == '' && is_numeric($data['amount_page'][0])) {
                    $orders_sql->where('amount_page', '>=', $data['amount_page']);
                }
                if (is_numeric($data['amount_page'][1]) && is_numeric($data['amount_page'][0])) {
                    $orders_sql->whereBetween('amount_page', $data['amount_page']);
                }
            }
            $price = explode(',', $data['price']);
            $orders_sql->whereBetween('price', $price);
        }


        $orders = $orders_sql->paginate(20);
        $max = Order::where('status_id', 1)->max('price');
        return view('orders.index', compact('orders', 'max'));

    }


    public function index()
    {


        $orders = Order::my()->orderby('created_at', 'desc')->get();

        return view('home.orders.index', compact('orders'));
    }

    public function create()
    {
        $order = new Order();
        $types = Type::get();
        $themes = ThemeCatagory::with('getthemes')->get();

        return view('home.orders.create', compact('order', 'types', 'themes'));
    }

    public function store()
    {

        $data = request()->all();
        $data['user_id'] = auth()->user()->id;
        $data['status_id'] = 1;

        $order = Order::create($data);
        if (request()->hasFile('file')) {
            foreach (request()->file('file') as $file) {

                $filename = uniqid() . '.' . $file->clientExtension();
                $file->storeAs('/orders/', $filename, ['disk' => 'public']);

                $data['file'] = $filename;
                $fileo = new OrderFile();
                $fileo->file = $filename;
                $fileo->order_id = $order->id;
                $fileo->name = $file->getClientOriginalName();
                $fileo->save();
            }
        }


        return redirect('/home/orders');
    }

    public function update(Order $order)
    {


        $order = Order::where('user_id', auth()->user()->id)->firstOrFail();
        if (request()->has('delete')) {
            $order->delete();
            return redirect('/home/orders');
        }

        $order->update(request()->all());

        return redirect('/home/orders');
    }


    public function edit(Order $order)
    {
if(request()->has('delete_file')){
    OrderFile::where('id',request('delete_file'))->where('order_id',$order->id)->delete();


}

        $types = Type::get();
        $themes = ThemeCatagory::with('getthemes')->get();
        $statsis = OrderStatus::whereIN('id', [1, 5])->get();
        return view('home.orders.create', compact('order', 'types', 'themes', 'statsis'));
    }


    public function createNoAuth()
    {
        $data = request()->all();
        $user = User::where('email', $data['email'])->first();
        if ($user) {
            session()->flash('error_email');
            return redirect()->back();
        }
        $pass = rand(111111, 999999);
        $user = User::create([
            'name' => $data['email'],
            'email' => $data['email'],
            'user_type' => 0,
            'phone' => 0,
            'city' => 0,
            'balance' => 0,
            'password' => Hash::make($pass),
        ]);
        $order = new Order();
        $order->name = $data['name'];
        $order->status_id = 1;
        $order->user_id = $user->id;
        $order->type_id = $data['type_id'];
        $order->theme_id = $data['theme_id'];
        $order->save();

        \Auth::loginUsingId($user->id);

        return redirect('/home/orders');


    }
}
