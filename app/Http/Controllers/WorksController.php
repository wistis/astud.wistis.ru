<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderStatus;
use App\Pay;
use App\ThemeCatagory;
use App\Type;
use App\Work;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class WorksController extends Controller
{

    public  function bayed_list(){


        $pays=Pay:: where('user_id',auth()->user()->id)->whereNOTNULL('payd_at')->paginate(20);





        return view('home.works.list',compact( 'pays'));
    }

public function bayed_view($id){


     $pay=Pay::where('id',$id)->where('user_id',auth()->user()->id)->firstOrFail();
     $work=Work::where('id',$pay->order_id)->firstOrFail();




        return view('works.view',compact('work','pay'));

}


    public function view(){
        $work=Work::where('status_id',1)->firstOrFail();
        $pay=new Pay();



        return view('works.view',compact('work','pay'));
    }

    public function works()
    {
        $orders_sql = Work::where('status_id', 1)->orderby('created_at', 'desc');
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
                if (is_numeric($data['amount_page'][1] ) && is_numeric($data['amount_page'][0])) {
                    $orders_sql->whereBetween('amount_page', $data['amount_page']);
                }
            }
            $price=explode(',',$data['price']);
            $orders_sql->whereBetween('price', $price);
        }



        $orders =$orders_sql->paginate(20);
        $max = Work::where('status_id', 1)->max('price');
        return view('works.index', compact('orders', 'max'));


    }


    public function index()
    {

        $orders = Work::my()->orderby('created_at', 'desc')->get();

        return view('home.works.index', compact('orders'));
    }

    public function create()
    {
        $order = new Work();
        $types = Type::get();
        $themes = ThemeCatagory::with('getthemes')->get();

        return view('home.works.create', compact('order', 'types', 'themes'));
    }

    public function store()
    {

        $data = request()->all();
        $data['user_id'] = auth()->user()->id;
        $data['status_id'] = 1;
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $filename = uniqid() . '.' . $file->clientExtension();
            $file->storeAs('/works/', $filename, ['disk' => 'public']);

            $data['file'] = $filename;



        }
        Work::create($data);
        return redirect('/home/works');
    }

    public function update(Order $order)
    {


        $order = Work::where('user_id', auth()->user()->id)->firstOrFail();
        if (request()->has('delete')) {
            $order->delete();
            return redirect('/home/works');
        }

        $order->update(request()->all());

        return redirect('/home/works');
    }


    public function edit(Work $work)
    {

        $order = $work;
        $types = Type::get();
        $themes = ThemeCatagory::with('getthemes')->get();
        $statsis = OrderStatus::whereIN('id', [1, 5])->get();
        return view('home.works.create', compact('order', 'types', 'themes', 'statsis'));
    }


}
