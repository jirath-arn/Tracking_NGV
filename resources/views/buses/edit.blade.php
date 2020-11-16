@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Bus</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('buses.index') }}" enctype="multipart/form-data">Back</a>
            </div>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('buses.update',$bus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>NGV Number:</strong>
                    <input type="text" name="ngv_number" value="{{ $bus->ngv_number }}" class="form-control" placeholder="NGV Number">

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
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
@endsection