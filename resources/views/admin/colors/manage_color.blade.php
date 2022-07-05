@extends('admin/layout')
@section('page_title', 'Manage Catgory')
@section('container')

<h1 class="mb-10">Manage Color</h1>
<a href="{{route('admin.color')}}">
    <button class="btn btn-success">Back Colors</button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    
                    <div class="card-header">Manage Color</div>
                    <div class="card-body">
                        <!-- <hr> -->
                        <form action="{{route('color.insert')}}" method="post" >
                            @csrf
                            
                            <div class="form-group has-success">
                                <label for="color" class="control-label mb-1">Color</label>
                                <input id="color" name="color" type="text" class="form-control" value="@if(isset($data->color)){{ $data->color }}@endif" placeholder="Enter Color">
                                @error('color')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                                <input type="hidden" name="color_id" value="@if(isset($data->id)) {{ $data->id }} @endif">
                            </div>
                            
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>          
    </div>
</div>
@endsection