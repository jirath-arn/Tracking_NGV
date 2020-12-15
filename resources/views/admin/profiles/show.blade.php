@extends('layouts.test')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.profile.title') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.profiles.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.name') }}
                        </th>
                        <td>
                            <!-- Name -->
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}">
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.profile.fields.name_helper') }}
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.email') }}
                        </th>
                        <td>
                            <!-- Email -->
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}">
                                @if($errors->has('email'))
                                    <p class="help-block">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                                <p class="helper-block">
                                    {{ trans('cruds.profile.fields.email_helper') }}
                                </p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

            <!-- Save -->
            <div>
                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>

    </div>
</div>
@endsection