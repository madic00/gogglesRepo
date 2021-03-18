<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\Utility;
use App\Models\Category;
use App\Models\ImageUpload;
use Illuminate\Http\Request;
use App\Models\FilterProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends MyBaseController
{

    const PAGINATE_LIMIT = 10;

    public function fetchProducts(Request $request) 
    {
        $productModel = new FilterProduct();

        if($request->has("number")) {
            $numberForPagination = $request->number;
        } else {
            $numberForPagination = self::PAGINATE_LIMIT;
        }

        $products = $productModel->getAdminProducts($request)->paginate($numberForPagination);

        return response()->json($products);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = FilterProduct::paginate(self::PAGINATE_LIMIT);

        return view("admin.products.index", $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::all();

        $this->data['brands'] = Brand::all();

        return view('admin.products.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        DB::beginTransaction();

        try 
        {
            $image = ImageUpload::upload($request->name, $request->image);

            $images = [
                'imageSecond' => ImageUpload::upload($request->name, $request->image2),
                'imageThrid' => ImageUpload::upload($request->name, $request->image3)
            ];

            $product = Product::create($request->except(['image', 'price', 'image2', 'image3']) + ["image" => $image]);

            $price = Price::create(['product_id' => $product->id, 'price' => floatval($request->price)]);

            foreach($images as $image) {
                Image::create(['image' => $image, 'product_id' => $product->id]);
            }

            DB::commit();

            return redirect()->route('products.create')->with('success', 'Product added successfully!');
        }
        catch(Exception $e) 
        {
            Log::error($e->getMessage());

            // dd($e->getMessage());

            DB::rollBack();

            return redirect()->route('products.create')->with('errorMessage', 'A server error occurred!');            
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] = Product::with('prices')->find($id);

        return view('client.pages.single', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product'] = Product::with('prices')->with('images')->find($id);

        $this->data['categories'] = Category::all();

        $this->data['brands'] = Brand::all();

        return view('admin.products.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);

        DB::beginTransaction();

        try 
        {
            $product->update($request->except('image', 'image2', 'image3', 'price'));

            if($request->has('image')) {
                $newImage = ImageUpload::upload($request->name, $request->image);
                ImageUpload::delete($product, 'image');
                $product->image = $newImage;
                $product->save();
            }

            if($request->has('image2')) {
                $imageObj = Image::where('product_id', $product->id)->first();
                $newImage = ImageUpload::upload($request->name, $request->image2);
                ImageUpload::delete($product, 'image');
                $imageObj->image = $newImage;

                $imageObj->save();

            }

            if($request->has('image3')) {
                $imageObj = Image::where('product_id', $product->id)->orderBy('updated_at', 'desc')->first();

                $newImage = ImageUpload::upload($request->name, $request->image2);
                ImageUpload::delete($product, 'image');
                $imageObj->image = $newImage;

                $imageObj->save();

            }

            if($product->prices[count($product->prices) - 1]->price != $request->price) {
                Price::create(['product_id' => $product->id, 'price' => floatval($request->price)]);
            }            

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Product updated successfully!');

        }
        catch(Exception $e) {
            Log::error($e->getMessage());

            DB::rollBack();
            
            // dd($e->getMessage());
            return redirect()->route('products.edit', $product->id)->with('errorMessage', 'A server error occurred!');   
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::beginTransaction();

        try 
        {
            $product = Product::find($id);
            
            $product->prices()->delete();
            
            $product->images()->delete();
            
            $product->delete();
            Utility::deleteDirectory(public_path() . "/assets/images/$product->name");

            DB::commit();

            return redirect()->route('products.index')->with('success', 'Product deleted successfully!');  

        }
        catch(Exception $e) 
        {
            Log::error($e->getMessage());

            // dd($e->getMessage());

            DB::rollBack();

            return redirect()->route('products.index')->with('errorMessage', 'Product can not be deleted, because it is contained in orders!');
        }


    }
}
