@extends('admin/layout')
@section('page_title', 'Manage Catgory')
@section('container')

<h1 class="mb-10">Manage Category</h1>
<a href="{{route('admin.category')}}">
    <button class="btn btn-success">Back Category</button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    
                    <div class="card-header">Manage Category</div>
                    <div class="card-body">
                        <!-- <hr> -->
                        <form action="{{route('category.insert')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="category_name" class="control-label mb-1">Category</label>
                                <input id="category_name" name="category_name" type="text" class="form-control" value="@if(isset($data->category_name)) {{ $data->category_name }} @endif" placeholder="Enter Category">
                                @error('category_name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="category_slug" class="control-label mb-1">Category slug</label>
                                <input id="category_slug" name="category_slug" type="text" class="form-control" value="@if(isset($data->category_slug)) {{ $data->category_slug }} @endif" placeholder="Enter Slug">
                                @error('category_slug')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                                <input type="text" name="category_id" value="@if(isset($data->id)) {{ $data->id }} @endif">
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