@extends('admin/layout')
@section('page_title', 'Manage Products')
@section('container')

@if(isset($data->id) && $data->id > 0)
    {{ $image_require = ''; }}
@else
    {{ $image_require = 'required'; }}
@endif
<h1 class="mb-10">{{ $title }}</h1>
<a href="{{route('admin.products')}}">
    <button class="btn btn-success">Back</button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                   
                    <div class="card-body">
                        <!-- <hr> -->
                        <form action="{{route('product.insert')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group has-success">
                                <label for="product_name" class="control-label mb-1">Name</label>
                                <input id="product_name" name="product_name" type="text" class="form-control" value="@if(isset($data->name)){{ $data->name }}@endif" placeholder="Enter product name">
                                @error('product_name')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                                <input type="hidden" name="product_id" value="@if(isset($data->id)) {{ $data->id }} @endif">
                            </div>
                            <div class="form-group has-success">
                                <label for="product_slug" class="control-label mb-1">Slug</label>
                                <input id="product_slug" name="product_slug" type="text" class="form-control" value="@if(isset($data->slug)){{ $data->slug }}@endif" placeholder="Enter product name">
                                @error('product_slug')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="product_image" class="control-label mb-1">Image</label>
                                <input id="product_image" name="product_image" type="file" class="form-control" {{ $image_require }}>

                                @error('product_image')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="product_category" class="control-label mb-1">Category</label>
                                <!-- <input  type="text" value="@if(isset($data->category_id)){{ $data->category_id }}@endif" placeholder="Category"> -->
                                <select id="product_category" name="product_category"  class="form-control">
                                    @if(isset($categories) && !empty($categories))

                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if(isset($data->category_id) && $data->category_id == $category->id) selected @endif>{{ $category->category_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group has-success">
                                <label for="product_brand" class="control-label mb-1">Brand</label>
                                <input id="product_brand" name="product_brand" type="text" class="form-control" value="@if(isset($data->brand)){{ $data->brand }}@endif" placeholder="Enter product brand">

                                @error('product_brand')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="product_model" class="control-label mb-1">Model</label>
                                <input id="product_model" name="product_model" type="text" class="form-control" value="@if(isset($data->model)){{ $data->model }}@endif" placeholder="Enter product model">
                            </div>
                            <div class="form-group has-success">
                                <label for="short_desc" class="control-label mb-1">Short Description</label>
                                <textarea id="short_desc" name="short_desc" type="text" class="form-control" placeholder="Enter product short description">@if(isset($data->short_desc)){{ $data->short_desc }}@endif</textarea>
                            </div>
                            <div class="form-group has-success">
                                <label for="short_desc" class="control-label mb-1">Description</label>
                                <textarea id="desc" name="desc" type="text" class="form-control" placeholder="Enter product description">@if(isset($data->desc)){{ $data->desc }}@endif</textarea>
                            </div>
                            <div class="form-group has-success">
                                <label for="keywords" class="control-label mb-1">Keywords</label>
                                <textarea id="keywords" name="keywords" type="text" class="form-control" placeholder="Enter product keywords">@if(isset($data->keywords)){{ $data->keywords }}@endif</textarea>

                                @error('keywords')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                                <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" placeholder="Enter product Technical Specification">@if(isset($data->technical_specification)){{ $data->technical_specification }}@endif</textarea>
                            </div>
                            <div class="form-group has-success">
                                <label for="product_uses" class="control-label mb-1">uses</label>
                                <textarea id="product_uses" name="product_uses" type="text" class="form-control" placeholder="Enter product uses">@if(isset($data->uses)){{ $data->uses }}@endif</textarea>
                            </div>
                            <div class="form-group has-success">
                                <label for="product_warrenty" class="control-label mb-1">Warrenty</label>
                                <textarea id="product_warrenty" name="product_warrenty" type="text" class="form-control" placeholder="Enter product warrenty">@if(isset($data->warrenty)){{ $data->warrenty }}@endif</textarea>
                            </div>
                            <!-- <div class="form-group has-success">
                                <label for="product_warrenty" class="control-label mb-1">Warrenty</label>
                                <textarea id="product_warrenty" name="product_warrenty" type="text" class="form-control" placeholder="Enter product warrenty">@if(isset($data->product_warrenty)){{ $data->product_warrenty }}@endif</textarea>
                            </div> -->

                            
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