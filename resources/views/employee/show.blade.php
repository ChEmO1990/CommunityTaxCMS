@extends('layouts.app')

@section('content')
@include('layouts.modal')
<section class="content">
  <div class="box box-primary">
    <div class="box-body">
     <!-- title row -->
     <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-user-circle-o"></i> {{ $employee->name }}
          @if( $employee->status === 1 ) 
          <small class="pull-right">Start Date: {{ $employee->start_date }}</small>
          @else
          <small class="pull-right"> <b style="color:black;">Start Date: {{ $employee->start_date }}</b> 
            | <b style="color:red;">Term Date: {{ $employee->term_date }}</b> </small>
            @endif
          </h2>
        </div>
        <!-- /.col -->
      </div>

      @if( $employee->status === 0 )
      <div class="callout callout-info">
        <h4>Transfer Information</h4>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <strong>Forward Name To:</strong><p>    {{ $employee->fwd_to_name }} </p>
            <address>
              <strong>Forward Extension To:</strong><p>    {{ $employee->fwd_to_ext }} </p>
              <strong>Forward Mails to:</strong><p>    {{ $employee->fwd_to_mail }} </p>
            </address>
          </div>
        </div>
      </div>
      @endif

      <!-- /.row -->

      <div class="panel-body">
        {!! Form::open() !!}
        <div class="form-group">
          {!! Form::label('network_account', 'Network Account') !!} 
          {!! Form::label('network_account', $employee->network_account, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
          {!! Form::label('email', 'Email') !!} 
          {!! Form::label('email', $employee->email, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
          {!! Form::label('clone_account', 'Clone Account') !!} 
          {!! Form::label('clone_account', $employee->clone_account, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
          {!! Form::label('location', 'Location') !!} 
          {!! Form::label('location', $employee->location, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
          {!! Form::label('job_title', 'Job Title') !!} 
          {!! Form::label('job_title', $employee->job_title, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
          {!! Form::label('did', 'DID') !!} 

          @if($employee->did == '')
          {!! Form::label('did', 'N/A', ['class'=>'form-control']) !!} 
          @else 
          {!! Form::label('did', $employee->did, ['class'=>'form-control']) !!} 
          @endif
        </div>

        <div class="form-group">
          {!! Form::label('ext', 'Extension') !!} 

          @if($employee->ext == '')
          {!! Form::label('ext', 'N/A', ['class'=>'form-control']) !!} 
          @else 
          {!! Form::label('ext', $employee->ext, ['class'=>'form-control']) !!} 
          @endif
        </div>
        {!! Form::close() !!}
      </div>

      <!-- /.row -->

      @if( $employee->status === 1 ) 
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <h2 class="page-header">
            <i class="fa fa-id-card-o"></i> Accounts
          </h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Account Type</th>
                <th>Username</th>
                <th>Password</th>
                <tr>
                  @foreach($accounts as $account)
                  <tr>  
                    <td>{{ $account->type_account }} </td>
                    <td>{{ $account->user_name }} </td>
                    <td>{{ $account->password }} </td>
                    <tr>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            @endif
            
            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-xs-12">
                @if( $employee->status === 1 ) 
                <a href="{{ route('employees.edit', $employee->id) }}">
                  <button type="button" class="btn btn-danger pull-right">Termination</button>
                </a>

                <a href="{{ route('employees.edit', $employee->id) }}">
                  <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">Edit Information</button>
                </a>

                <a href="{{ action('Download\DownloadController@downloadPDF', $employee->id) }}">
                  <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">Generate PDF</button>
                </a>
                @else
                <a href="{{ route('employees.edit', $employee->id) }}">
                  <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">Edit Information</button>
                </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
      @endsection