<?php

namespace App\Http\Controllers;

use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserActionController extends MyBaseController
{
    public function index() 
    {
        $this->data['actions'] = UserAction::with('user')->get();

        return view('admin.actions.index', $this->data);
    }

    public function filter(Request $request) 
    {
        $date = date("Y-m-d", strtotime($request->date));

        $actions = UserAction::with('user');

        if($request->selectAll == 'false') {
            $actions = $actions->whereRaw("DATE(created_at) = '$date'");
        }

        // $actions = UserAction::where('created_at', '=', $date)->get();
        $actions = $actions->get();

        return response()->json($actions);
    }

}
