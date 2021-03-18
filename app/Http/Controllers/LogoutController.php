<?php

namespace App\Http\Controllers;

use App\Models\UserAction;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request) 
    {

        UserAction::create(['action' => 'Log out', 'user_id' => $request->session()->get('user')->id]);

        $request->session()->remove('user');
        return redirect()->route('home');
    }

}
