@extends('layouts.app')

@section('content')
@include('layouts.modal')
<section class="content">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="box box-primary">
    <div class="box-body">
     <!-- title row -->
     <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-user-circle-o"></i> {{ $employee->name }}
        </h2>
      </div>
      <!-- /.col -->
    </div>

    <div class="panel-body">
      {!! Form::open(['action' => ['Employee\EmployeeController@update', $employee->id], 'method'=>'POST']) !!}
      <div class="form-group">
        {!! Form::label('network_account', 'Network Account') !!} 
        {!! Form::text('network_account', $employee->network_account, ['class'=>'form-control']) !!}  
      </div>

      <div class="form-group">
        {!! Form::label('email', 'Email') !!} 
        {!! Form::text('email', $employee->email, ['class'=>'form-control']) !!}  
      </div>

      <div class="form-group">
        {!! Form::label('clone_account', 'Clone Account') !!} 
        {!! Form::text('clone_account', $employee->clone_account, ['class'=>'form-control']) !!}  
      </div>

      <div class="form-group">
            <label>Location</label>
            <select class="form-control" name="location">
                <option>Chicago</option>
                <option>Cancun</option>
                <option>Puerto Rico</option>
            </select>
        </div>

      <div class="form-group">
        {!! Form::label('job_title', 'Job Title') !!} 
        {!! Form::text('job_title', $employee->job_title, ['class'=>'form-control']) !!}  
      </div>

      <div class="form-group">
        {!! Form::label('did', 'DID') !!} 
        {!! Form::text('did', $employee->did, ['class'=>'form-control']) !!} 
      </div>

      <div class="form-group">
        {!! Form::label('ext', 'Extension') !!} 
        {!! Form::text('ext', $employee->ext, ['class'=>'form-control']) !!} 
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
                  @foreach($accounts as $key=>$account)
                  <tr>  
                    <td> {!! Form::text('type_account', $account->type_account, ['class'=>'form-control']) !!} </td>
                    <td> {!! Form::text('username'.$key, $account->user_name, ['class'=>'form-control']) !!} </td>
                    <td> {!! Form::text('password'.$key, $account->password, ['class'=>'form-control']) !!} </td>
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

            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-xs-12">
                <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">Save Information</button>
              </div>
            </div>
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::close() !!}
          </div>
        </div>
      </section>
      <!-- /.content -->
      @endsection