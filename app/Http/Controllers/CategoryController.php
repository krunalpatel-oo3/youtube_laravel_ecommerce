<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Category::all();
        return view('admin/category', $result);
    }

    public function manage_category(Request $request,$id = ''){
        $result = array();
        if($id){
            $result['data'] = Category::where(['id' => $id])->first();
            
        }
        // dd($result);
        return view('admin/manage_category', $result);
    }

    public function manage_category_process(Request $request){
        
        $request->validate([
                    'category_name' => 'required',
                    'category_slug' => 'required|unique:categories,category_slug,'.$request->category_id,
                ]);
        if($request->category_id){
            $model = Category::find($request->category_id);
            $message = 'Category Updated';
        }else{
            $model = new Category();
            $message = 'Category Updated';
        }

        $model->category_name = $request->category_name;
        $model->category_slug = $request->category_slug;
        $model->save();

        $request->session()->flash('message' , $message);

        return redirect('admin/category');
        
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
        
        $category_result = Category::find($id);
        $category_result->delete();

        $request->session()->flash('message', 'Category Deleted'); 

        return redirect('admin/category');
    }
}
