@extends('layouts.admin')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Stations</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('admin.stations.create') }}">Create Station</a>
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
            <th>Name Station</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Last Update</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($stations as $station)
        <tr>
            <td>{{ $station->id }}</td>
            <td>{{ $station->name_station }}</td>
            <td>{{ $station->latitude }}</td>
            <td>{{ $station->longitude }}</td>
            <td>{{ $station->update_at }}</td>
            <td>
                <form action="{{ route('admin.stations.destroy', $station->id ) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('admin.stations.edit', $station->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ml-2">Delete</button>
                </form>
            </td>
            
         
        </tr>
    
        @endforeach
       
        
        
    </table>
    {!! $stations->links() !!}
</div>
@endsection