<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBY('id','DESC')->paginate(5);

        return view('orders.index',compact('orders'));
    }


    public function changeStatus(Request $request, Order $order){
        // dd($order);
        $order->update(['status'=>$request->status]);
        return redirect()->route('user.order')->with('message','Status Changed');
    }
}
