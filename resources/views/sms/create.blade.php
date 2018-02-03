@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 align="center">Sms Number</h3></div>

                <div class="panel-body">
                    {!! Form::open(array('route'=>'sms.store')) !!}
                        <div class="form-group">
                            {!! Form::label('sms_number', 'Phone number') !!} 
                            {!! Form::text('sms_number', null, ['class'=>'form-control']) !!}  
                        </div>

                        <div class="form-group">
                            {!! Form::label('assign_to', 'Assign to') !!} 
                            {!! Form::text('assign_to', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('sms_number', 'Phone number') !!} 
                            {!! Form::text('sms_number', null, ['class'=>'form-control']) !!}  
                        </div>

                        <div class="form-group">
                            {!! Form::label('assign_to', 'Assign to') !!} 
                            {!! Form::text('assign_to', null, ['class'=>'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::date('name', \Carbon\Carbon::now()) !!} 
                        </div>

                        <div class="form-group">
                            {!! Form::date('name', \Carbon\Carbon::now()) !!} 
                        </div>

                        <div class="form-group">
                            {!! Form::email('Hola', 'fjksjfksfj, $attributes = array()) !!} 
                        </div>

                        <div class="form-group">
                            {!! Form::button('Create', ['type'=>'submit', 'class'=>'btn btn-primary btn-block']) !!} 
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