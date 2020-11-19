@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add Station</h2>
            </div>
            <!--<div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.buses.index') }}">Back</a>
            </div>-->
        </div>
    </div>
    <br>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('admin.stations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name Station:</strong>
                    <input type="text" name="name_station" class="form-control" placeholder="Name Station">
                    
                    @error('name_station')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Latitude:</strong>
                    <input type="text" name="latitude" class="form-control" placeholder="Latitude">
                    
                    @error('latitude')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Longitude:</strong>
                    <input type="text" name="longitude" class="form-control" placeholder="Longitude">
                    
                    @error('longitude')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-success ml-3">Create</button>
                    <a class="btn btn-danger ml-3" href="{{ route('admin.stations.index') }}">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection