<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Size::all();
        // dd($result);
        return view('admin/sizes/index', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $require, $id = '')
    {
        $result = array();
        if($id){
            $result['data'] = Size::where(['id' => $id])->first();
        }
        return view('admin/sizes/manage_size', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
                    'size'  => 'required|unique:sizes,size,'.$request->size_id,
                ]);
        if($request->size_id){
            $model = Size::find($request->size_id);
            $message = 'Size Updated';
        }else{
            $model = new Size();
            $message = 'Size Inserted';
        }

        $model->size = $request->size;
        $model->save();

        $request->session()->flash('message', $message);

        return redirect('admin/size');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function show(sizes $sizes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function edit(sizes $sizes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sizes $sizes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sizes  $sizes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $size_result = Size::find($id);
        $size_result->delete();

        $request->session()->flash('message', 'The size has been deleted .');

        return redirect('admin/size');
    }
}
