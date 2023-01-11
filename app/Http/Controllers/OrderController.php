<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function showBarberOrdersView(){
        $idleOrders = Order::where('status',0)->where('barber_id', Auth::guard('web_barber')->user()->id)->get();
        $orders = Order::where('status','<>',0)->where('barber_id', Auth::guard('web_barber')->user()->id)->get();
        return view('pages.admin.order.index')->with('orders', $orders)->with('idleOrders', $idleOrders);
    }

    public function storeApproval(Request $request){
        $id = $request->id;
        $status = $request->status;

        $updateStatus = Order::where('id', $id)->update(['status' => $status]);

        if(Auth::guard('web_barber')->check()){
            $idleOrders = Order::where('status',0)->where('barber_id', Auth::guard('web_barber')->user()->id)->get();
            $orders = Order::where('status','<>',0)->where('barber_id', Auth::guard('web_barber')->user()->id)->get();
            return view('pages.admin.order.index')->with('idleOrders', $idleOrders)->with('orders', $orders);
        }
        else {
            $barbers = Barber::all();
            $services = Service::all();

            return view('pages.guest.home')->with('barbers', $barbers)->with('services', $services);
        }
    }

    public function showProfileBooking(){
        $user_id = Auth::guard('web')->user()->id;
        $order = Order::where('user_id', $user_id)->where('is_finish', false)->first();
        if(empty($order)){
            return redirect()->route('service-view');
        }
        return view('pages.customer.profile_book_detail')->with('order', $order);
    }

    public function showBarberDetailOrderView(Order $order){
        if($order->user_id != Auth::guard('web_barber')->user()->id){
            return redirect()->route('adminorder');
        }

        return view('pages.admin.order.detail')->with('order', $order);
    }

    public function setOrderFinish(Order $order){
        if($order->user_id != Auth::guard('web_barber')->user()->id){
            return redirect()->route('adminorder');
        }

        $order->is_finish = true;
        $order->save();

        return $this->showBarberDetailOrderView($order);
    }

    public function delete(Order $order){
        $user_id = Auth::guard('web')->user()->id;
        if($order->user_id !== $user_id){
            return redirect()->route('home');
        }
        $order->delete();
        return redirect()->route('home');
    }
}
