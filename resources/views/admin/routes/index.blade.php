@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Routes</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('admin.routes.create') }}">Create Route</a>
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
            <th>Name Route</th>
            <th>Order Of Bus</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($routes as $route)
        <tr>
            <td>{{ $route->id }}</td>
            <td>{{ $route->name_route }}</td>
            <td>{{ $route->order_of_bus }}</td>
            <td>
                <form action="{{ route('admin.routes.destroy', $route->id ) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('admin.routes.edit', $route->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
    {!! $routes->links() !!}
</div>
@endsection