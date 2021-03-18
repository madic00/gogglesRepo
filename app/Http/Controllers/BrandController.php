<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Exception;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['brands'] = Brand::all();

        return view('admin.brands.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        DB::beginTransaction();

        try 
        {
            Brand::create($request->all());

            DB::commit();

            return redirect()->route('brands.create')->with('success', 'Brand added successfully!');
        } 
        catch (Exception $e) 
        {
            Log::error($e->getMessage());

            // dd($e->getMessage());

            DB::rollBack();

            return redirect()->route('brands.create')->with('errorMessage', 'A server error occurred!');  
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['brand'] = Brand::find($id);

        return view('admin.brands.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $brand = Brand::find($id);

        DB::beginTransaction();
        
        try {
            $brand->update($request->all());

            DB::commit();

            return redirect()->route('brands.index')->with('success', 'Brand updated successfully!');
        }
        catch(Exception $e) 
        {
            Log::error($e->getMessage());

            DB::rollBack();
            
            // dd($e->getMessage());
            return redirect()->route('products.edit', $brand->id)->with('errorMessage', 'A server error occurred!'); 

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

        try {
            $brand = Brand::find($id);
            $brand->delete();

            DB::commit();

            return redirect()->route('brands.index')->with('success', 'Brand deleted successfully!');  

        }
        catch(Exception $e) 
        {
            Log::error($e->getMessage());
            // dd($e->getMessage());

            DB::rollBack();

            return redirect()->route('brands.index')->with('errorMessage', 'Brand can not be deleted, because it contains products!'); 
        }

    }
}
