@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3 align="center">Phone Numbers List</h3> </div>
                    <div class="panel-heading" align="right">
                        <div class="panel-heading" align="center">
                            <a href="url">{{ link_to_route('sms.create', 'Add Number', null) }}</a>
                        </div>
                        
                        <form action="{{ route('sms.index') }}" method="get" class="form-inline">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s" placeholder="Search" value=" {{ isset($s) ? $s : '' }}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>

                        </form>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Sms Number</th>
                            <th>User name</th>
                        <tr>
                            @foreach($my_list as $sms)
                            <tr>
                                <td>{{ $sms->sms_number}} </td>
                                <td>{{ $sms->assign_to}} </td>
                                <td>
                                    {!! Form::open(['action' => ['Sms\SmsNumberController@destroy', $sms->id], 'method'=>'POST', 'class' => 'pull-right']) !!}
                                        {{ link_to_route('sms.edit', 'Edit', [$sms->id], ['class'=>'btn btn-primary btn-sm']) }}
                                    |
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}

                                </td>
                            <tr>
                            @endforeach
                        </table>
                </div>
            </div>
            @if(empty($s))
                {{ $my_list->links() }}
                {{ var_dump($my_list) }}

            @else
                {{ $my_list->appends(['s' => $s])->links() }}
                {{ var_dump($my_list) }}
            @endif
        </div>
    </div>
</div>
@endsection