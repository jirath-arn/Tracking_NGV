@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Buses</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('buses.create') }}">Create Bus</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>NGV Number</th>
            <th>License Plate</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($buses as $bus)
        <tr>
            <td>{{ $bus->id }}</td>
            <td>{{ $bus->ngv_number }}</td>
            <td>{{ $bus->license_plate }}</td>
            <td>
                <form action="{{ route('buses.destroy',$bus->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('buses.edit',$bus->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
    {!! $buses->links() !!}
</div>
@endsection