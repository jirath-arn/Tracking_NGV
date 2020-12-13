@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit NGV Bus</h2>
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

    <form action="{{ route('admin.buses.update', $bus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NGV Number:</strong>
                    <select name="ngv_number" class="form-control">
                        <option value="" disabled selected hidden>Please Choose...</option>
                        @foreach ($routes as $route)
                            <option value="{{$route->id}}" <?php if("$bus->route_id" == "$route->id") { echo("selected"); }?>>{{ $route->name_route }}</option>
                        @endforeach
                    </select>

                    @error('ngv_number')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>License Plate:</strong>
                    <input type="text" name="license_plate" class="form-control" placeholder="License Plate" value="{{ $bus->license_plate }}">

                    @error('license_plate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-success ml-3">Edit</button>
                    <a class="btn btn-danger ml-3" href="{{ route('admin.buses.index') }}" enctype="multipart/form-data">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
