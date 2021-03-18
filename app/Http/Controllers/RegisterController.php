<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\RegisterUserRequest;
use App\Models\UserAction;

class RegisterController extends MyBaseController
{

    public function index()
    {
        return view("client.pages.register", $this->data);
    }

    public function store(RegisterUserRequest $request)
    {

        $role_id = 2;

        DB::beginTransaction();

        try {
            //store user
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => md5($request->password),
                'role_id' => $role_id,
            ]);

            UserAction::create(['action' => 'Registration', 'user_id' => $user->id]);

            DB::commit();

            return back()->with('registerSuccess', 'You have successfully registered! ');

        } catch(\Exception $e) {
            DB::rollBack();

            Log::error($e->getMessage());

            return back()->with('registerError', 'Try again!');

        }


        //sign the user in
        // auth()->attempt($request->only('email', 'password')); // user model or null

        //redirect
        // return redirect()->route('dashboard');
    }

}
