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
          {!! Form::label('manager', 'Manager') !!} 
          {!! Form::text('manager', $employee->manager, ['class'=>'form-control']) !!}  
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
                    <td> {{ $account->type_account }} </td>
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

            <div class="form-group with-border">
              <h3 class="box-title">Checklist</h3>

              <div class="checkbox">
                <label>
                  @if($employee->clogics_account === 1)
                  <input type="checkbox" name="clogics_account" checked="checked">
                  @else
                  <input type="checkbox" name="clogics_account">
                  @endif
                  Create 3CLogics Account
                </label>
              </div>

              <div class="checkbox">
                <label>
                 @if($employee->logics_account === 1)
                 <input type="checkbox" name="logics_account" checked="checked">
                 @else
                 <input type="checkbox" name="logics_account">
                 @endif
                 Create Logics Account
               </label>
             </div>

             <div class="checkbox">
              <label>
                @if($employee->assign_logics_sms === 1)
                <input type="checkbox" name="assign_logics_sms" checked="checked">
                @else
                <input type="checkbox" name="assign_logics_sms">
                @endif
                Assign Logics SMS
              </label>
            </div>

            <div class="checkbox">
              <label>
                @if($employee->tax_preparer_udfid === 1)
                <input type="checkbox" name="tax_preparer_udfid" checked="checked">
                @else
                <input type="checkbox" name="tax_preparer_udfid">
                @endif
                If Tax Preparer add to UDFID 102 in IRSLogics
              </label>
            </div>

            <div class="checkbox">
              <label>
                @if($employee->tax_preparers_eas === 1)
                <input type="checkbox" name="tax_preparers_eas" checked="checked">
                @else
                <input type="checkbox" name="tax_preparers_eas">
                @endif
                Prog Mon for Tax Preps, EA's, and Negotiators
              </label>
            </div>

            <div class="checkbox">
              <label>
                @if($employee->ifax_account === 1)
                <input type="checkbox" name="ifax_account" checked="checked">
                @else
                <input type="checkbox" name="ifax_account">
                @endif
                Create I-Fax Account    
              </label>
            </div>

            <div class="checkbox">
              <label>
                @if($employee->spark_account === 1)
                <input type="checkbox" name="spark_account" checked="checked">
                @else
                <input type="checkbox" name="spark_account">
                @endif
                Create Spark Account 
              </label>
            </div>

            <div class="checkbox">
              <label>
                @if($employee->ds_account === 1)
                <input type="checkbox" name="ds_account" checked="checked">
                @else
                <input type="checkbox" name="ds_account">
                @endif
                Create DS Acct, Inbox, Auto Import
              </label>
            </div>

            <div class="checkbox">
              <label>
                @if($employee->user_to_scanner === 1)
                <input type="checkbox" name="user_to_scanner" checked="checked">
                @else
                <input type="checkbox" name="user_to_scanner">
                @endif
                Add User to Scanner/Fax/Printers
              </label>
            </div>
          </div>

          @endif
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary pull-right">Save Information</button>

              <a href="{{ route('employees.index') }}">
                <button type="button" class="btn btn-danger pull-right" style="margin-right: 5px;">Cancel</button>
              </a>

            </div>
          </div>
          {!! Form::hidden('_method', 'PUT') !!}
          {!! Form::close() !!}
        </div>
      </div>
    </section>
    <!-- /.content -->
    @endsection
