<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\FilterProduct;
use App\Models\SliderImage;
use Illuminate\Http\Request;

class FrontController extends MyBaseController
{

    const PAGINATE_LIMIT = 12;

    public function home() 
    {        
        $this->data['sliderImages'] = SliderImage::where('active', 1)->get();

        $this->data['products'] = FilterProduct::where('is_active', 1)->where('brand_active', 1)->paginate(self::PAGINATE_LIMIT);

        return view("client.pages.home", $this->data);
    }

    public function about() 
    {
        return view('client.pages.about', $this->data);
    }

    public function products() 
    {
        $this->data['categories'] = Category::all();
        $this->data['brands'] = Brand::where('brand_active', 1)->get();

        $this->data['products'] = FilterProduct::where('is_active', 1)->where('brand_active', 1)->paginate(self::PAGINATE_LIMIT);

        $this->data['featured_products'] = FilterProduct::where('is_active', 1)->where('brand_active', 1)->where('featured', 1)->take(8)->get();

        return view("client.pages.products", $this->data);
    }

    public function product($id) 
    {
        $product = Product::with('category')->with('brand')->with('prices')->find($id);

        if(!$product) {
            return redirect()->route('home.products');
        }

        $this->data['product'] = $product;

        $this->data['featured_products'] = FilterProduct::where('is_active', 1)->where('brand_active', 1)->where('featured', 1)->take(8)->get();

        return view('client.pages.single', $this->data);
    }

    public function author() 
    {
        return view('client.pages.author', $this->data);
    }

    public function productsFetch(Request $request) 
    {
        $productModel = new FilterProduct();

        $products = $productModel->getProducts($request)->paginate(self::PAGINATE_LIMIT);

        // dd($products);

        return response()->json($products);
    }


}
