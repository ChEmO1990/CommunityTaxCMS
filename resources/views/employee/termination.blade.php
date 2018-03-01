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
    <div class="panel-body">
     <!-- title row -->
     <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-user-circle-o"></i> {{ $employee->name }}
          <small class="pull-right">Start Date: {{ $employee->start_date }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <div class="panel-body">
      {!! Form::open(['action' => ['Employee\EmployeeController@termination', $employee->id], 'method'=>'GET']) !!}
      <div class="form-group">
        <label>Term Date:</label>
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input name="term_date" type="text" class="form-control pull-right" id="datepicker" data-provide="datepicker">
        </div>
      </div>

      <div class="form-group">
        {!! Form::label('fwd_to_name', 'Forward Name To:') !!} 
        {!! Form::text('fwd_to_name', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('fwd_to_ext', 'Forward Extension To:') !!} 
        {!! Form::text('fwd_to_ext', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group">
        {!! Form::label('fwd_to_mail', 'Forward Mails to:') !!} 
        {!! Form::text('fwd_to_mail', null, ['class'=>'form-control']) !!}
      </div>

      <div class="form-group with-border">
        <h3 class="box-title">Checklist</h3>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="run_script">
            Run Script
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="delete_app_calendar">
            Delete Appt Calendar
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="move_tasks_in_logics">
            MoveTasksInLogicsToMgr
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="release_sms">
            ReleaseSMS#inSpreadsheet
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="set_logics_to_inactive">
            SetLogicsToInactive
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="dis_empl_account">
            DisEmplAcct
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="rel_ext">
            RelExt
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="check_mac">
            CheckMac 
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="golive">
            UseGoLive
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="removehylafax_account">
            DelHylaFAXAcct
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="printer_scanner">
            Printer/Scanner
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="remove_scandocs_folder">
            RemfrmScanDocsFolder
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="movedocs_autoimport">
            MoveDocs/RemAutoImport
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="remove_docstar_inbox">
            Del DS Inbox
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="remfrm_trueportal">
            RemFrmTruePortal
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="remfrm_adt">
            RemfrmADT
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="remfrm_website">
            RemfrmWebsite
          </label>
        </div>
        
        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            {!! Form::button('Terminate Now', ['type'=>'submit', 'class'=>'btn btn-danger pull-right']) !!} 
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
</section>
<!-- /.content -->
@endsection