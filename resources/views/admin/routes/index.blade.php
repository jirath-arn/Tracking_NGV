@extends('layouts.admin')
@section('content')
<!-- Create -->
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('admin.routes.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.route.title_singular') }}
        </a>
    </div>
</div>

<!-- Card -->
<div class="card">
    <div class="card-header">
        {{ trans('cruds.route.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Route">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.route.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.name_route') }}
                        </th>
                        <th>
                            {{ trans('cruds.route.fields.order_of_stations') }}
                        </th>
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($routes as $key => $route)
                        <tr data-entry-id="{{ $route->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $route->id ?? '' }}
                            </td>
                            <td>
                                {{ $route->name_route ?? '' }}
                            </td>
                            <td>
                                @foreach($route->stations as $key => $item)
                                    <span class="badge badge-info">{{ $item->name_station }}</span>
                                @endforeach
                            </td>
                            <td>
                                <!-- Edit -->
                                <a class="btn btn-xs btn-info" href="{{ route('admin.routes.edit', $route->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.routes.destroy', $route->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  // Delete Table

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Route:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection