<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['colors'] = Color::all();

        return view('admin/colors/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id='')
    {
        $result = array();
        if($id != ''){
            $result['data'] = Color::where(['id' => $id])->first();
        }

        return view('admin/colors/manage_color',$result);

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
                    'color'=> 'required|unique:colors,color,'.$request->color_id,  
                ]);

        if($request->color_id){
            $model   = Color::find($request->color_id);
            $message = 'Color updated';
        }else{
            $model = new Color();
            $message = 'Color inserted';
        }   

        $model->color = $request->color;
        $model->save();

        $request->session()->flash('message', $message);
        return redirect('admin/colors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try{
            $result_color = Color::find($id);
            $result_color->delete();
        }catch(\Throwable $e){
            $request->session()->flash('message', 'Something went wrong');
            return redirect('admin/colors');
        }

        $request->session()->flash('message', 'The color has been deleted');

        return redirect('admin/colors');
    }

    /**
     * Change the status. 
     * 
     */
    public function status(Request $request, $status, $id){
        try{
            $result_color = Color::find($id);
            $result_color->status = $status; 
            $result_color->save 
        }catch(\Throwable $e){
            $request->session()->flash('message', 'Something went wrong');
            return redirect('admin/colors');
        }

        $request->session()->flash('message', 'The status has been updated.');
        return redirect('admin/colors');
    } 

}
