@extends('admin/layout')
@section('page_title', 'Colors')
@section('container')

<h1>Colors</h1>
<a href="{{route('admin.manage_color')}}" class="">
	<button class="btn btn-success">Add Color</button>
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
                        <th>Color</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($colors) && !empty($colors))
                    @foreach($colors as $color)
                    <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->color }}</td>
                        <td class="process">
                            @if(isset($color->status) && $color->status == 0)
                                <a href="{{route('color.status', ['status'=>1,'id' =>$color->id ] )}}" class="btn btn-success" title="Make InActive">InActive</a>
                            @elseif(isset($color->status) && $color->status == 1)
                                <a href="{{route('color.status', ['status'=>0,'id' =>$color->id ])}}" class="btn btn-warning" title="Make Active">Active</a>
                            @endif
                            <a href="{{route('color.delete', $color->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('admin.color.edit', $color->id)}}" class="btn btn-success">Edit</a>
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