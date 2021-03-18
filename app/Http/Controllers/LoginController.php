<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;

class LoginController extends MyBaseController
{

    public function index() 
    {
        // dd(session()->get('fromCart'));

        if(session()->has('fromCart')) {
            $this->data['fromCart'] = true;
        }

        return view('client.pages.login', $this->data);
    }

    public function store(LoginRequest $request) 
    {

        try {

            $user = User::where('email', $request->email)
                        ->where('password', md5($request->password))
                        ->firstOrFail();

            if($user) {
                $request->session()->put("user", $user);

                UserAction::create(['action' => 'Login', 'user_id' => $user->id]);

                if($request->has('fromCart')) {
                    return redirect()->route('cart');
                }
                
                return redirect()->route('home.products');
            } else {
                return back()->with('loginFail', 'Wrong combination of email and password.');
            }

        } catch (\Exception $e) {
            Log::error($e->getMessage());

            // dd($e->getMessage()); // posto nema usera ulazi u catch

            return back()->with('loginFail', 'Wrong combination of email and password.');

        }

    }

    
    // public function store(LoginRequest $request) 
    // {

    //     try {

    //         $user = User::where('email', $request->email)
    //                     ->where('password', md5($request->password))
    //                     ->firstOrFail();

    //         if($user) {
    //             $request->session()->put("user", $user);
    //             return response(['message' => 'User is logged in'], Response::HTTP_OK);

    //             // return redirect()->route('products');

    //         } else {
    //             return response(['message' => 'User is logged in'], Response::HTTP_INTERNAL_SERVER_ERROR);

    //         }

    //     } catch (\Exception $e) {
    //         Log::error($e->getMessage());

    //         return response(['message'=> 'Login data is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);

    //     }

    // }

}
