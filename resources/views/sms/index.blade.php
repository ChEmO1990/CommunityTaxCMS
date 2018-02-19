@extends('layouts.app')

@section('content')
@include('layouts.modal')
<section class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="box-body">
                <div class="form-group">
                    Filters:
                    <a href="/sms?status=available">Available</a> |
                    <a href="/sms?status=notavailable">Not Available</a> |
                    <a href="/sms">Reset</a> |
                </div>
                <div div class="col-xs-12>
                    <a href="url">{{ link_to_route('sms.create', 'Add Sms Number', null, ['class'=>'btn btn-primary btn-sm pull-right']) }}</a>

                    <form action="{{ route('sms.index') }}" method="get" class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" name="s" placeholder="Keyword">
                        </div>

                        <div class="form-group" align="rigth">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table category-table" data-toggle="dataTable" data-form="deleteForm">
                <tr>
                <th>Status</th>
                <th>User name</th>
                <th>Sms Number</th>
                <th>Comment</th>
                <th>Actions</th>
                <tr>
                    @foreach($my_list as $sms)
                <tr>
                    <td> 
                        @if( $sms->status == 1 )
                            <span class="label label-success">Available</span>
                        @else 
                            <span class="label label-danger">Not Available</span>
                        @endif
                    </td>
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
            @if(request('status') == 'available')
                {{ $my_list->appends(['status' => 'available'])->links() }}
            @elseif(request('status') == 'notavailable')
                {{ $my_list->appends(['status' => 'notavailable'])->links() }}
            @elseif(request('status') == 'reset')
                {{ $my_list->links() }}
            @else
                {{ $my_list->links() }}
            @endif
        @else
            {{ $my_list->appends(['s' => $s])->links() }}
        @endif
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection