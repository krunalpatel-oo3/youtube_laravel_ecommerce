@extends('admin/layout')
@section('page_title', 'Manage Coupon')
@section('container')

<h1 class="mb-10">Manage Coupon</h1>
<a href="{{route('admin.coupon')}}">
    <button class="btn btn-success">Back Coupon</button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    
                    <div class="card-header">Manage Coupon</div>
                    <div class="card-body">
                        <!-- <hr> -->
                        <form action="{{route('coupon.insert')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" name="title" type="text" class="form-control" value="@if(isset($data->title)){{ $data->title }}@endif" placeholder="Enter Title">
                                @error('title')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="code" class="control-label mb-1">Code</label>
                                <input id="code" name="code" type="text" class="form-control" value="@if(isset($data->code)){{ $data->code }}@endif" placeholder="Enter Code">
                                @error('code')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group has-success">
                                <label for="value" class="control-label mb-1">Value</label>
                                <input id="value" name="value" type="text" class="form-control" value="@if(isset($data->value)){{ $data->value }}@endif" placeholder="Enter Value">
                                @error('value')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="coupon_id" value="@if(isset($data->id)) {{ $data->id }} @endif">
                            
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>          
    </div>
</div>
@endsection