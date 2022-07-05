@extends('admin/layout')
@section('page_title', 'Coupons')
@section('container')

<h1>Categories</h1>
<a href="{{route('admin.manage_coupon')}}">
	<button class="btn btn-success">Add Coupon</button>
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
                        <th>Title</th>
                        <th>Code</th>
                        <th>Value</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data) && !empty($data))
                    @foreach($data as $coupon)
                    <tr>
                        <td>{{ $coupon->id }}</td>
                        <td>{{ $coupon->title }}</td>
                        <td>{{ $coupon->code }}</td>
                        <td>{{ $coupon->value }}</td>
                        <td class="process">
                            <a href="{{route('coupon.delete', $coupon->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('admin.coupon.edit', $coupon->id)}}" class="btn btn-success">Edit</a>
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