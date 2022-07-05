<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = 'Products';
        $data['products'] = Product::all();

        return view('admin/products/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id='')
    {
        $result = array();
        $result['title'] = 'Manage Products';
        if($id != ''){
            $result['data'] = Product::where(['id' => $id])->first();
        }

        $result['categories'] = DB::table('categories')->where(['status' => 1])->get();
        // dd($result['category']);
        return view('admin/products/manage_product',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->product_id){
            $image_validation = 'mimes:jpeg,jpg,png';
        }else{
            $image_validation = 'required|mimes:jpeg,jpg,png';
        }
        $request->validate([
                    'product_slug'=> 'required|unique:products,slug,'.$request->product_id,  
                    'product_name'=> 'required',  
                    'product_brand'=> 'required',  
                    'keywords'=> 'required',
                    'product_image' => $image_validation   
                ]);
        // dd($request->all());

        if($request->product_id){
            $model   = Product::find($request->product_id);
            $message = 'Product updated';
        }else{
            $model = new Product();
            $message = 'Product inserted';
        }   

        //Image upload
        if($request->hasfile('product_image')){

            $image = $request->file('product_image');
            $ext   = $image->extension();
            $image_name = time().'.'.$ext; 
            $image->storeAs('/public/media/', $image_name);
            $model->image = $image_name;  
        }
        
        $model->name = $request->product_name;
        $model->slug = $request->product_slug;
        $model->category_id = $request->product_category;
        // $model->category_id = 1;
        $model->brand= $request->product_brand;
        $model->model= $request->product_model;
        $model->short_desc = $request->short_desc;
        $model->desc = $request->desc;
        $model->keywords   = $request->keywords;
        $model->technical_specification  = $request->technical_specification;
        $model->uses  = $request->product_uses;
        $model->warrenty  = $request->product_warrenty;
        // $model->status  = 1;
        $model->save();

        $request->session()->flash('message', $message);
        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try{
            $result = Product::find($id);
            $result->delete();
        }catch(\Throwable $e){
            $request->session()->flash('message', 'Something went wrong');
            return redirect('admin/products');
        }

        $request->session()->flash('message', 'The product has been deleted');

        return redirect('admin/products');
    }
    /**
     *@uses function to change the status. 
     */
    public function status(Request $request, $status,$id){
        try{
            $result = Product::find($id);
            $result->status = $status; 
            $result->save(); 
        }catch(\Throwable $e){
            $request->session()->flash('message', 'Something went wrong');
            return redirect('admin/products');
        }
        if($status == 1){
            $message = 'Activated';
        }else{
            $message = 'Inactivated';
        }

        $request->session()->flash('message', "The status has been $message.");
        return redirect('admin/products');
    }
}
