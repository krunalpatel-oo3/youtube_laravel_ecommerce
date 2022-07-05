<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Coupon::all();
        // dd($result);
        return view('admin/coupons/coupon', $result);
    }

    /**
     *@uses function to display add/edit form of the coupon 
     */
    public function manage_coupon(Request $request,$id = ''){
        $result = array();
        if($id){
            $result['data'] = Coupon::where(['id' => $id])->first();
            
        }
        return view('admin/coupons/manage_coupon', $result);
    }

    /**
     *@uses function to manage coupon 
     *@for INSERT & UPDATE 
     */
    public function manage_coupon_process(Request $request){
        $request->validate([
                    'title' => 'required',
                    'code'  => 'required|unique:coupons,code,'.$request->coupon_id,
                    'value' => 'required|numeric'.$request->category_id,
                ]);
        if($request->coupon_id){
            $model = Coupon::find($request->coupon_id);
            $message = 'Coupon Updated';
        }else{
            $model = new Coupon();
            $message = 'Coupon Inserted';
        }

        $model->title   = $request->title;
        $model->code    = $request->code;
        $model->value   = $request->value;
        $model->save();

        $request->session()->flash('message' , $message);

        return redirect('admin/coupon');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $coupon_result = Coupon::find($id);
        $coupon_result->delete();

        $request->session()->flash('message', 'Coupon Deleted'); 

        return redirect('admin/coupon');
    }
}
