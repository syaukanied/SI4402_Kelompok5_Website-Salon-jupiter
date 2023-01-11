<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PageController extends Controller
{
    public function home(){
        $barbers = Barber::all();

        // return dd($barbers);
        $services = Service::all();

        if(Auth::guard('web_barber')->check() == true){
            return redirect()->route('admin');
        }
        return view('pages.guest.home')
            ->with('barbers', $barbers)
            ->with('services', $services);
    }

    public function dashboard(){
        if(Auth::guard('web')->user()->role == 'admin'){
            $idleOrders = Order::where('status',0)->get();
            $orders = Order::where('status', '<>', 0)->get();
            return view('pages.admin.dashboard')->with('idleOrders', $idleOrders)->with('orders', $orders);
        }
        else {
            $barbers = Barber::all();
            $services = Service::all();

            return view('pages.guest.home')->with('barbers', $barbers)->with('services', $services);
        }
    }

    public function storeDashboard(Request $request){
        $id = $request->id;
        $status = $request->status;

        $updateStatus = Order::where('id', $id)->update(['status' => $status]);

        if(Auth::guard('web')->user()->role == 'admin'){
            $idleOrders = Order::where('status',0)->get();
            $orders = Order::where('status', '<>', 0)->get();
            return view('pages.admin.dashboard')->with('idleOrders', $idleOrders)->with('orders', $orders);
        }
        else {
            $barbers = Barber::all();
            $services = Service::all();

            return view('pages.guest.home')->with('barbers', $barbers)->with('services', $services);
        }
    }

    // start booking service logic
    public function indexBookService(){
        $user = User::findOrFail(Auth::guard('web')->user()->id);
        if($user->orders()->where('is_finish', false)->count() > 0){
            return redirect()->route('user.order-user-view');
        }

        $services = Service::all();
        return view('pages.customer.service.index')->with('services', $services);
    }

    public function storeBookService(Request $request){
        $validator = Validator::make($request->all(), [
            'service_id' => ['required', 'exists:services,id']
        ]);
        if($validator->fails()){
            return redirect()->route('service-view');
        }

        $data = $validator->validated();
        if(empty($request->session()->get('order'))){
            $order = new Order();
            $order->fill($data);
            $request->session()->put('order', $order);
        }else{
            $order = $request->session()->get('order');
            $order->fill($data);
            $request->session()->put('order', $order);
        }

        if($order->service->has_category){
            return redirect()->route('service.category-view');
        }
        return redirect()->route('service.artist-view');
    }

    public function indexBookServiceCategory(Request $request){
        if(empty($request->session()->get('order'))){
            return redirect()->route('service-view');
        }

        $order = $request->session()->get('order');
        $service = Service::findOrFail($order->service_id);
        if($service->has_category == true){
            return view('pages.customer.service.category')
                ->with('service_categories', $service->service_categories()->get());
        }else{
            return redirect()->route('service.artist-view');
        }
    }

    public function storeBookServiceCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'service_category_id' => ['required', 'exists:service_categories,id']
        ]);
        if($validator->fails()){
            return redirect()->route('service.category-view');
        }

        $data = $validator->validated();
        $order = $request->session()->get('order');
        $order->fill($data);
        $request->session()->put('order', $order);

        return redirect()->route('service.subcategory-view');
    }

    public function indexBookServiceSubCategory(Request $request){
        if(empty($request->session()->get('order'))){
            return redirect()->route('service-view');
        }
        $order = $request->session()->get('order');
        $serviceCategory = ServiceCategory::findOrFail($order->service_category_id);
        if($serviceCategory->has_sub_category == true){
            return view('pages.customer.service.sub_category')->with('service_sub_categories', $serviceCategory->service_sub_categories()->get());
        }else{
            return redirect()->route('service.artist-view');
        }
    }

    public function storeBookServiceSubCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'service_sub_category_id' => ['required', 'exists:service_sub_categories,id']
        ]);
        if($validator->fails()){
            return redirect()->route('service.subcategory-view');
        }

        $data = $validator->validated();
        $order = $request->session()->get('order');
        $order->fill($data);
        $request->session()->put('order', $order);

        return redirect()->route('service.artist-view');
    }

    public function indexServiceOrderBarbers(Request $request){
        if(empty($request->session()->get('order'))){
            return redirect()->route('service-view');
        }
        $barbers = Barber::all();
        return view('pages.customer.hair_artist')->with('barbers', $barbers);
    }

    public function storeServiceOrderBarbers(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'date' => ['required', 'date'],
            'price' => ['min:0'],
            'barber_id' => ['required', 'exists:barbers,id']
        ]);
        $data = $validator->validated();
        $order = $request->session()->get('order');
        $order->fill($data);
        $request->session()->put('order', $order);
        return redirect()->route('service.order-view');
    }

    public function indexServiceBookDetail(Request $request){
        if(empty($request->session()->get('order'))){
            return redirect()->route('service-view');
        }
        $order = $request->session()->get('order');
        return view('pages.customer.book_detail')->with('order', $order->load(['service', 'service_category', 'service_sub_category', 'barber']));
    }

    public function storeServiceBookDetail(Request $request){
        $validator = Validator::make($request->all(), [
            'cancel' => ['sometimes'],
            'order' => ['sometimes']
        ]);

        $data = $validator->validated();
        if(isset($data['cancel'])){
            $request->session()->forget('order');
            return redirect()->route('home');
        }
        if(isset($data['order'])){
            $order = $request->session()->get('order');
            $order->user_id = Auth::guard('web')->user()->id;
            $order->save();
            $request->session()->forget('order');
            return redirect()->route('home');
        }
    }
    // end of booking service
}
