<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderInfo;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends MyBaseController
{

    public function store(StoreOrderRequest $request) 
    {
        DB::beginTransaction();

        try 
        {
            $order = Order::create($request->all() + ['is_paid' => 1]);

            $productsFromCart = Cart::select('product_id', 'quantity')->where('user_id', $request->session()->get('user')->id)->get();

            // dd($productsFromCart);

            foreach($productsFromCart as $pid) {
                $product = Product::with('prices')->where('id', $pid->product_id)->first();

                $orderInfo = OrderInfo::create(['product_id' => $product->id, 'product_name' => $product->name, 'price' => $product->prices[count($product->prices) - 1]->price, 'quantity' => $pid->quantity, 'order_id' => $order->id]);

            }

            $removed = Cart::where('user_id', $request->user_id)->delete();

            UserAction::create(['action' => 'Order completed!', 'user_id' => $request->user_id]);

            DB::commit();

            return response(['message' => 'Order is successfully recorded! Thank you!'], Response::HTTP_CREATED);
            
        }
        catch (\Exception $e) 
        {
            Log::error($e->getMessage());

            DB::rollBack();

            dd($e->getMessage());

            return response(['message'=> 'Order data is Invalid',],Response::HTTP_UNPROCESSABLE_ENTITY);
        }


    }

    public function index() 
    {
        $this->data['orders'] = Order::with('order_infos')->get();
        
        return view('admin.orders.index', $this->data);
    }

}
