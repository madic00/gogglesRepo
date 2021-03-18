<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BackController extends MyBaseController
{
    public function home() 
    {
        $this->data['total_sum'] = Order::sum('total_price');
        $this->data['orders_num'] = Order::count('id');
        $this->data['products_num'] = Product::count('id');

        return view('admin.pages.home', $this->data);
    }

}
