<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends MyBaseController
{

    public function cart(Request $request) 
    {
        // if(!$request->session()->has('user')) {
        //     return redirect()->route('login')->with('fromCart', 'true');
        // }

        $productIds = Cart::select('product_id', 'quantity')->where('user_id', $request->session()->get('user')->id)->get();

        // $products = DB::table('products')->whereIn('id', $productIds)->get();

        $products = [];

        foreach($productIds as $pid) {
            $singleProduct = Product::with('prices')->where('id', $pid->product_id)->first();
            $singleProduct->quantity = $pid->quantity;

            $products[] = $singleProduct;
        }

        $this->data['products'] = $products;

        return view('client.pages.cart', $this->data);
    }

    public function store(Request $request) 
    {
        // dd($request->productId);
        
        $user = $request->session()->get('user');

        DB::beginTransaction();

        try {

            $cartObj = Cart::where('user_id', '=', $user->id)
                            ->where('product_id', $request->productId)->first();

            if($cartObj)  {
                $product = Product::find($request->productId);

                $cartObj->quantity = $cartObj->quantity + 1;
                $cartObj->save();

                DB::commit();

                return response(['message' => "Updated quantity for $product->name glasses!"], Response::HTTP_OK);
            }

            $cart = new Cart;
            $cart->product_id = $request->productId;
            $cart->user_id = $user->id;

            $result = $cart->save();

            UserAction::create(['action' => 'Added to cart', 'user_id' => $user->id]);

            DB::commit();

            if($result) {
                return response(['message' => 'Successfully added to the cart!'], Response::HTTP_CREATED);
            } else {
                return response(['message'=> 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            DB::rollBack();

            return response(['message'=> 'Cart data is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);
            
        }
        
    }

    public function destroy(Request $request) 
    {
        // if(!$request->session()->has('user')) {
        //     return response(['message'=> 'Login first!'], Response::HTTP_UNAUTHORIZED);
        // }

        DB::beginTransaction();

        try {
            $cart = Cart::where('product_id', $request->productId)->first();

            $result = $cart->delete();

            UserAction::create(['action' => 'Removed to cart', 'user_id' => $request->session()->get('user')->id]);

            $itemsInCart = Cart::where('user_id', '=', $request->session()->get('user')->id)->get();

            DB::commit();

            if(count($itemsInCart) == 0) {
                return response(['message' => 'Removed last product from cart.'], Response::HTTP_BAD_REQUEST);
            }

            if($result) {
                return response(['message' => 'Successfully removed product from cart!', 'itemsInCart' => $itemsInCart], Response::HTTP_OK);
            } else {
                return response(['message'=> 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            
        } 
        catch (\Exception $e) 
        {
            Log::error($e->getMessage());

            DB::rollBack();

            return response(['message'=> 'Cart data is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
    }

    public function changeQuantity(Request $request) 
    {
        try {
            $cart = Cart::where('product_id', $request->productId)->first();

            $cart->quantity = $request->quantity;

            $result = $cart->save();

            $itemsInCart = Cart::where('user_id', '=', $request->session()->get('user')->id)->get();


            UserAction::create(['action' => 'Changed quantity', 'user_id' => $request->session()->get('user')->id]);

            if($result) {
                return response(['message' => 'Successfully changed quantity!', 'itemsInCart' => $itemsInCart], Response::HTTP_OK);
            } else {
                return response(['message'=> 'Server Error'], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
        catch(\Exception $e) 
        {
            Log::error($e->getMessage());

            return response(['message'=> 'Quantity is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

}
