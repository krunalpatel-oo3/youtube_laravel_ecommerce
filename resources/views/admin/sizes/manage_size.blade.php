@extends('admin/layout')
@section('page_title', 'Manage Size')
@section('container')

<a href="{{route('admin.size')}}">
    <button class="btn btn-success">Back Size</button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    
                    <div class="card-header">Manage Size</div>
                    <div class="card-body">
                        <!-- <hr> -->
                        <form action="{{route('size.insert')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="size" class="control-label mb-1">Size</label>
                                <input id="size" name="size" type="text" class="form-control" value="@if(isset($data->size)){{ $data->size }}@endif" placeholder="Enter Size">
                                @error('size')
                                    <span class="help-block text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" name="size_id" value="@if(isset($data->id)) {{ $data->id }} @endif">
                            
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