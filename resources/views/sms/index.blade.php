@extends('layouts.app')

@section('content')
@include('layouts.modal')
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="panel-heading" align="center">
                <a href="url">{{ link_to_route('sms.create', 'Add Number', null, ['class'=>'btn btn-primary btn-sm']) }}</a>
            </div>
            <form action="{{ route('sms.index') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" name="s" placeholder="Keyword">
                </div>

                <div class="form-group" align="rigth">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <table class="table table-bordered table-striped table-hover category-table" data-toggle="dataTable" data-form="deleteForm">
            <tr>
                <th>User name</th>
                <th>Sms Number</th>
                <th>Comment</th>
                <tr>
                    @foreach($my_list as $sms)
                <tr>
                    <td>{{ $sms->assign_to}} </td>
                    <td>{{ $sms->sms_number}} </td>
                    <td>{{ $sms->comment}} </td>
                    <td>

                        {!! Form::model($sms, ['method' => 'delete', 'route' => ['sms.destroy', $sms->id], 'class' =>'pull-right  form-delete']) !!}
                        {!! Form::hidden('id', $sms->id) !!}
                        {!! Form::submit(trans('Delete'), ['class' => 'btn btn-danger btn-sm', 'name' => 'delete_modal']) !!}
                        {!! Form::close() !!}
                        {{ link_to_route('sms.edit', 'Edit', [$sms->id], ['class'=>'pull-right btn btn-primary btn-sm']) }}

                            </td>
                <tr>
                    @endforeach
        </table>
        @if(empty($s))
            {{ $my_list->links() }}
        @else
            {{ $my_list->appends(['s' => $s])->links() }}
        @endif
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection