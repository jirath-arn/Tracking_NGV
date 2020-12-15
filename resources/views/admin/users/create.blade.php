@extends('layouts.test')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>

            <!-- Email -->
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                @if($errors->has('email'))
                    <p class="help-block">
                        {{ $errors->first('email') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>

            <!-- Password -->
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}*</label>
                <input type="password" id="password" name="password" class="form-control" value="{{ old('password', isset($user) ? $user->password : '') }}" autocomplete="new-password">
                @if($errors->has('password'))
                    <p class="help-block">
                        {{ $errors->first('password') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>

            <!-- Confirm Password -->
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="password_confirmation">{{ trans('cruds.user.fields.password_confirmation') }}*</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ old('password', isset($user) ? $user->password : '') }}" autocomplete="new-password">
                @if($errors->has('password_confirmation'))
                    <p class="help-block">
                        {{ $errors->first('password_confirmation') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_confirmation_helper') }}
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