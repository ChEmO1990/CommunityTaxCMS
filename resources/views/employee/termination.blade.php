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
            <input type="checkbox" name="delete_calendar">
            Delete Appt Calendar
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="move_task_logic">
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
            <input type="checkbox" name="set_logic_inactive">
            SetLogicsToInactive
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="dis_account">
            DisEmplAcct
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="rel_extension">
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
            <input type="checkbox" name="go_live">
            UseGoLive
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="del_hylafax">
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
            <input type="checkbox" name="rem_from_scandocs">
            RemfrmScanDocsFolder
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="movedocs">
            MoveDocs/RemAutoImport
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="remove_docstar">
            Del DS Inbox
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="rem_frm_trueportal">
            RemFrmTruePortal
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="rem_frm_ADT">
            RemfrmADT
          </label>
        </div>

        <div class="checkbox">
          <label>
            <input type="checkbox" name="rem_from_website">
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