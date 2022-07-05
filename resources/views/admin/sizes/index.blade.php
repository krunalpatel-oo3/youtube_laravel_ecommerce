@extends('admin/layout')
@section('page_title', 'Sizes')
@section('container')

<h1>Size</h1>
<a href="{{route('admin.manage_size')}}" class="">
	<button class="btn btn-success">Add Size</button>
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
                        <th>Size</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data) && !empty($data))
                    @foreach($data as $size)
                    <tr>
                        <td>{{ $size->id }}</td>
                        <td>{{ $size->size }}</td>
                        <td class="process">
                            <a href="{{route('size.delete', $size->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('admin.size.edit', $size->id)}}" class="btn btn-success">Edit</a>
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