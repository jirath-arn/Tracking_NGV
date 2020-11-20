@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Route</h2>
            </div>
            <!--<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.buses.index') }}" enctype="multipart/form-data">Back</a>
            </div>-->
        </div>
    </div>
    <br>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('admin.routes.update',$route->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name Route:</strong>
                    <input type="text" name="name_route" value="{{ $route->name_route }}" class="form-control" placeholder="Name Route">

                    @error('name_route')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Order Of Bus:</strong>
                    <input type="text" name="order_of_bus" value="{{ $route->order_of_bus }}" class="form-control" placeholder="Order Of Bus">

                    @error('order_of_bus')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-success ml-3">Edit</button>
                    <a class="btn btn-danger ml-3" href="{{ route('admin.routes.index') }}" enctype="multipart/form-data">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
