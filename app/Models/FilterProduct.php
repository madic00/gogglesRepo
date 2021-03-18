<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FilterProduct extends Model
{
    use HasFactory;

    protected $table = 'products_view';

    public function getProducts(Request $request) 
    {
        $products = new FilterProduct();

        $products = $products->where('is_active', 1);
        $products = $products->where('brand_active', 1);

        if($request->has('categories')) {
            $products = $products->whereIn('category_id', $request->categories);
        }

        if($request->has('brands')) {
            $products = $products->whereIn('brand_id', $request->brands);            
        }

        if($request->has('gender') && $request->gender != -10) {
            $products = $products->where('gender_id', $request->gender);
        }

        if($request->has('keyword') && $request->keyword != '') {
            $keyword = strtolower($request->keyword);

            $products = $products->where('name', 'like', '%' . $keyword . '%');
        }

        if($request->has('sort')) {
            $sort = $request->sort;

            $sortArr = explode("_", $sort);

            if($sortArr[0] == 'p') {                
                $products = $products->orderBy('price', $sortArr[1]);
            } else {
                $products = $products->orderBy('name', $sortArr[1]);
            }

        }

        return $products;

    }

    public function getAdminProducts(Request $request) 
    {
        $products = new FilterProduct();

        if($request->has('keyword') && $request->keyword != '') {
            $keyword = strtolower($request->keyword);

            $products = $products->where('name', 'like', '%' . $keyword . '%');                                
        }

        if($request->has('sort')) {
            $sort = $request->sort;

            $sortArr = explode("_", $sort);

            if($sortArr[0] == 'p') {                
                $products = $products->orderBy('price', $sortArr[1]);

            } else {
                $products = $products->orderBy('name', $sortArr[1]);
            }

        }

        return $products;

    }

}
