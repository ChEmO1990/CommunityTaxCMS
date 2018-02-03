@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 align="center">Update Sms Number</h3></div>

                <div class="panel-body">
                    {!! Form::open(['action' => ['Sms\SmsNumberController@update', $sms->id], 'method'=>'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('sms_number', 'Phone number') !!} 
                            {!! Form::text('sms_number', $sms->sms_number, ['class'=>'form-control']) !!}  
                        </div>

                        <div class="form-group">
                            {!! Form::label('assign_to', 'Assign to') !!} 
                            {!! Form::text('assign_to', $sms->assign_to, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('comment', 'Comment') !!} 
                            {!! Form::textarea('comment', $sms->comment, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::button('Update', ['type'=>'submit', 'class'=>'btn btn-primary btn-block']) !!} 
                        </div>

                        {!! Form::hidden('_method', 'PUT') !!}
                        {!! Form::close() !!}
                </div>
            </div>

            @if ( count( $errors ) > 0 )
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
            @endif
        </div>
    </div>
</div>
@endsection