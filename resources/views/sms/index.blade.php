@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> <h3 align="center">Phone Numbers List</h3> </div>
                    <div class="panel-heading">
                        {!! Form::open(['action' => ['Sms\SmsNumberController@show', ' '], 'method'=>'GET']) !!}
                        {{ Form::text('keyword', null, array('placeholder'=>'Search')) }}
                        {{ Form::submit('Search', array('class' => 'btn btn-success')) }}
                        {{ Form::close() }}
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
                                        {{ link_to_route('sms.edit', 'Edit', [$sms->id], ['class'=>'btn btn-primary']) }}
                                    |
                                    {!! Form::hidden('_method', 'DELETE') !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            <tr>
                            @endforeach
                        </table>
                        {{ $my_list->links() }}
                </div>
            </div>
            {{ link_to_route('sms.create', 'Create', null, ['class'=>'btn btn-success']) }}
        </div>
    </div>
</div>
@endsection