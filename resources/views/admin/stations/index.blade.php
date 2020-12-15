@extends('layouts.admin')
@section('content')
<!-- Create -->
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('admin.stations.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.station.title_singular') }}
        </a>
    </div>
</div>

<!-- Card -->
<div class="card">
    <div class="card-header">
        {{ trans('cruds.station.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Station">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.station.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.station.fields.name_station') }}
                        </th>
                        <th>
                            {{ trans('cruds.station.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.station.fields.longitude') }}
                        </th>
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stations as $key => $station)
                        <tr data-entry-id="{{ $station->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $station->id ?? '' }}
                            </td>
                            <td>
                                {{ $station->name_station ?? '' }}
                            </td>
                            <td>
                                {{ $station->latitude ?? '' }}
                            </td>
                            <td>
                                {{ $station->longitude ?? '' }}
                            </td>
                            <td>
                                <!-- Edit -->
                                <a class="btn btn-xs btn-info" href="{{ route('admin.stations.edit', $station->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.stations.destroy', $station->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  $('.datatable-Station:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection