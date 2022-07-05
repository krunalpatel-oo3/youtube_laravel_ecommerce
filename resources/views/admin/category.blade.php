@extends('admin/layout')
@section('page_title', 'Categorires')
@section('container')

<h1>Categories</h1>
<a href="{{route('admin.manage_category')}}">
	<button class="btn btn-success">Add Category</button>
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
                        <th>Category name</th>
                        <th>Category Slug</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data) && !empty($data))
                    @foreach($data as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->category_slug }}</td>
                        <td class="process">
                            @if($category->status == 1)
                                <a href="{{route('category.status', $category->id, 0)}}" class="btn btn-danger">Active</a> 
                            @elseif($category->status == 0)
                                <a href="{{route('category.status',['status' =>1, 'id' => $category->id ] )}}" class="btn btn-danger">Deactive</a>
                            @endif
                            <a href="{{route('category.delete', $category->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection