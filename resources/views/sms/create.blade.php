@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sms Numbers</div>

                <div class="panel-body">
                    {!! Form::open(array('route'=>'sms.store')) !!}
                        <div class="form-group">
                            {!! Form::label('sms_number', 'Enter number phone') !!} 
                            {!! Form::text('sms_number', null, ['class'=>'form-control']) !!}  
                        </div>

                        <div class="form-group">
                            {!! Form::label('assign_to', 'Enter user name') !!} 
                            {!! Form::text('assign_to', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('comment', 'Enter user name') !!} 
                            {!! Form::textarea('comment', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::button('Create phone number', ['type'=>'submit', 'class'=>'btn btn-primary']) !!} 
                        </div>

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