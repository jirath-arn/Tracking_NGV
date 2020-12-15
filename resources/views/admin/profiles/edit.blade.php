@extends('layouts.admin')
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

                            <!-- Save -->
                            <div>
                                <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.email_verified_at') }}
                        </th>
                        <td>
                            @if (is_null($user->email_verified_at))
                                <span style="color:RED">Not verified.</span>
                            @else
                                <span>$user->email_verified_at</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </form>

        <div>
            <!-- Delete -->
            <form action="{{ route('admin.profiles.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-danger" value="{{ trans('global.deleteAccount') }}">
            </form>
        </div>
    </div>
</div>
@endsection