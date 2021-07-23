<?php

namespace App\Http\Controllers;

use App\Pay;
use App\User;
use App\Work;
use Illuminate\Support\Facades\Hash;

class PayController extends Controller
{
    public function addmoney()
    {
        $data = request()->all();
        if (auth()->check()) {
            $works = Work::findOrFail($data['order_id']);
            $data['price'] = $works->price - auth()->user()->balance;
            $data['all_price'] = $works->price  ;
            $data['user_id'] = auth()->user()->id;

            if ($works->price > auth()->user()->balance) {

                $pay=$this->pay_works($data);

                return redirect('/home/works/bayed/' . $pay->id);

            }else{

                $data['payd_at']=date('Y-m-d H:i:s');
                $pay=$this->pay_works($data);
                if($pay->payd_at){
                    return redirect('/home/works/bayed/' . $pay->id);
                }
                auth()->user()->balance=auth()->user()->balance-$works->price;
                auth()->user()->save();
                return redirect('/home/works/bayed/' . $pay->id);
            }


        } else {

            $user = User::where('email', $data['email'])->first();
            if ($user) {
                return redirect('/login?url=' . $data['url']);

            }
            $pass=rand(11111,999999);
            $user = User::create([
                'name' => $data['email'],
                'email' => $data['email'],
                'user_type' => 0,
                'phone' => 0,
                'city' => 0,
                'balance' => 0,
                'password' => Hash::make($pass),
            ]);
            \Auth::loginUsingId($user->id);

            return back();


        }


    }
    public function pay_works($data){
unset($data['_token']);
unset($data['url']);
        $pay = Pay::where('user_id', $data['user_id'])->where('order_id',$data['order_id'])->first();
        if (!$pay) {
            $pay = Pay::create($data);

        } else {
             Pay::where('user_id', $data['user_id'])->where('order_id',$data['order_id'])->update($data);
        }
        return $pay;
    }
}