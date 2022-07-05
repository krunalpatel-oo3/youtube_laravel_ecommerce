@extends('admin/layout')
@section('page_title', 'Products')
@section('container')

<h1>{{ $title }}</h1>
<a href="{{route('admin.manage_product')}}" class="">
	<button class="btn btn-success">Add Product</button>
</a>
<h5 class="text-center">{{session('message')}}</h5>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($products) && !empty($products))
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>
                            @if(file_exists('storage/media/'.$product->image))
                                <img src="{{ asset('storage/media/'.$product->image) }}" class="img-thumbnail img-rounded" alt="{{$product->name}}" width="80">
                            @else
                                <img src="/images/photos/account/default.png" alt="">
                            @endif
                            
                        </td>
                        <td class="process">
                            @if(isset($product->status) && $product->status == 0)
                                <a href="{{route('product.status', ['status'=>1,'id' =>$product->id ] )}}" class="btn btn-success" title="Make Active">Active</a>
                            @elseif(isset($product->status) && $product->status == 1)
                                <a href="{{route('product.status', ['status'=>0,'id' =>$product->id ])}}" class="btn btn-warning" title="Make InActive">InActive</a>
                            @endif
                            <a href="{{route('product.delete', $product->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3" class="text-center">No Records found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection