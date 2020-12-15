@extends('layouts.test')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.bus.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.buses.update', $bus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Name Route -->
            <div class="form-group {{ $errors->has('route_id') ? 'has-error' : '' }}">
                <label for="route_id">{{ trans('cruds.bus.fields.name_route') }}*</label>
                <select name="route_id" id="route_id" class="form-control select2">
                    @foreach($routes as $id => $route)
                        <option value="{{ $id }}" {{ (isset($bus) && $bus->route ? $bus->route->id : old('route_id')) == $id ? 'selected' : '' }}>{{ $route }}</option>
                    @endforeach
                </select>
                @if($errors->has('route_id'))
                    <p class="help-block">
                        {{ $errors->first('route_id') }}
                    </p>
                @endif
            </div>

            <!-- License Plate -->
            <div class="form-group {{ $errors->has('license_plate') ? 'has-error' : '' }}">
                <label for="license_plate">{{ trans('cruds.bus.fields.license_plate') }}*</label>
                <input type="text" id="license_plate" name="license_plate" class="form-control" value="{{ old('license_plate', isset($bus) ? $bus->license_plate : '') }}">
                @if($errors->has('license_plate'))
                    <p class="help-block">
                        {{ $errors->first('license_plate') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.bus.fields.license_plate_helper') }}
                </p>
            </div>
            
            <!-- Save -->
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>

    </div>
</div>
@endsection