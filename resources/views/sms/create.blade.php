@extends('layouts.app')

@section('content')
<section class="content">
    <div class="box box-primary">
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
                            {!! Form::label('comment', 'Comment') !!} 
                            {!! Form::textarea('comment', null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::button('Create', ['type'=>'submit', 'class'=>'btn btn-primary']) !!} 
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
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection