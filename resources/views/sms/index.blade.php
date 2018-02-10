@extends('layouts.app')

@section('content')
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

        <table class="table">
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
                        {!! Form::open(['action' => ['Sms\SmsNumberController@destroy', $sms->id], 'method'=>'POST', 'class' => 'pull-right']) !!}
                            {{ link_to_route('sms.edit', 'Edit', [$sms->id], ['class'=>'btn btn-primary btn-sm']) }}
                            {!! Form::hidden('_method', 'DELETE') !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
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