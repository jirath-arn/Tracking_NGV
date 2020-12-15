@extends('layouts.test')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.route.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.routes.update', $route->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Name Route -->
            <div class="form-group {{ $errors->has('name_route') ? 'has-error' : '' }}">
                <label for="name_route">{{ trans('cruds.route.fields.name_route') }}*</label>
                <input type="text" id="name_route" name="name_route" class="form-control" value="{{ old('name_route', isset($route) ? $route->name_route : '') }}">
                @if($errors->has('name_route'))
                    <p class="help-block">
                        {{ $errors->first('name_route') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.route.fields.name_route_helper') }}
                </p>
            </div>

            <!-- Order of Stations -->
            <div class="form-group {{ $errors->has('stations') ? 'has-error' : '' }}">
                <label for="stations">{{ trans('cruds.route.fields.order_of_stations') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="stations[]" id="stations" class="form-control select2" multiple="multiple">
                    @foreach($stations as $id => $stations)
                        <option value="{{ $id }}" {{ (in_array($id, old('stations', [])) || isset($route) && $route->stations->contains($id)) ? 'selected' : '' }}>{{ $stations }}</option>
                    @endforeach
                </select>
                @if($errors->has('stations'))
                    <p class="help-block">
                        {{ $errors->first('stations') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.route.fields.order_of_stations_helper') }}
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