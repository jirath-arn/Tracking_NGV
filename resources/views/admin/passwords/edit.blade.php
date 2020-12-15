@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.changePassword.title_singular') }}
    </div>

    <div class="card-body">
        <form action="/admin/passwords/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- New Password -->
            <div class="form-group {{ $errors->has('password_new') ? 'has-error' : '' }}">
                <label for="password_new">{{ trans('cruds.changePassword.fields.password_new') }}*</label>
                <input type="password" id="password_new" name="password_new" class="form-control" value="">
                @if($errors->has('password_new'))
                    <p class="help-block">
                        {{ $errors->first('password_new') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.changePassword.fields.password_new_helper') }}
                </p>
            </div>

            <!-- Confirm New Password -->
            <div class="form-group {{ $errors->has('password_new_confirmation') ? 'has-error' : '' }}">
                <label for="password_new_confirmation">{{ trans('cruds.changePassword.fields.password_new_confirmation') }}*</label>
                <input type="password" id="password_new_confirmation" name="password_new_confirmation" class="form-control" value="">
                @if($errors->has('password_new_confirmation'))
                    <p class="help-block">
                        {{ $errors->first('password_new_confirmation') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.changePassword.fields.password_new_confirmation_helper') }}
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