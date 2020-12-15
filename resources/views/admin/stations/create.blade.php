@extends('layouts.test')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.station.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.stations.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name Station -->
            <div class="form-group {{ $errors->has('name_station') ? 'has-error' : '' }}">
                <label for="name_station">{{ trans('cruds.station.fields.name_station') }}*</label>
                <input type="text" id="name_station" name="name_station" class="form-control" value="{{ old('name_station', isset($station) ? $station->name_station : '') }}">
                @if($errors->has('name_station'))
                    <p class="help-block">
                        {{ $errors->first('name_station') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.station.fields.name_station_helper') }}
                </p>
            </div>

            <!-- Latitude -->
            <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                <label for="latitude">{{ trans('cruds.station.fields.latitude') }}*</label>
                <input type="text" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', isset($station) ? $station->latitude : '') }}">
                @if($errors->has('latitude'))
                    <p class="help-block">
                        {{ $errors->first('latitude') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.station.fields.latitude_helper') }}
                </p>
            </div>

            <!-- Longitude -->
            <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                <label for="longitude">{{ trans('cruds.station.fields.longitude') }}*</label>
                <input type="text" id="longitude" name="longitude" class="form-control" value="{{ old('longitude', isset($station) ? $station->longitude : '') }}">
                @if($errors->has('longitude'))
                    <p class="help-block">
                        {{ $errors->first('longitude') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.station.fields.longitude_helper') }}
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