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
        {!! Form::label('fwd_to_name', 'Forward Name To:') !!} 
        {!! Form::text('fwd_to_name', $employee->fwd_to_name, ['class'=>'form-control']) !!}  
      </div>

      <div class="form-group">
        {!! Form::label('fwd_to_ext', 'Forward Extension To:') !!} 
        {!! Form::text('fwd_to_ext', $employee->fwd_to_ext, ['class'=>'form-control']) !!}  
      </div>

      <div class="form-group">
        {!! Form::label('fwd_to_mail', 'Forward Mails to:') !!} 
        {!! Form::text('fwd_to_mail', $employee->fwd_to_mail, ['class'=>'form-control']) !!}  
      </div>

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
        {!! Form::label('manager', $employee->manager, ['class'=>'form-control']) !!}  
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

      <div class="form-group with-border">
        <h3 class="box-title">Checklist</h3>

        <div class="checkbox">
          <label>
            @if($employee->run_script === 1)
            <input type="checkbox" name="run_script" checked="checked">
            @else
            <input type="checkbox" name="run_script">
            @endif
            Run Script
          </label>
        </div>

        <div class="checkbox">
          <label>
           @if($employee->delete_app_calendar === 1)
           <input type="checkbox" name="delete_app_calendar" checked="checked">
           @else
           <input type="checkbox" name="delete_app_calendar">
           @endif
           Delete Appt Calendar
         </label>
       </div>

       <div class="checkbox">
        <label>
          @if($employee->move_tasks_in_logics === 1)
          <input type="checkbox" name="move_tasks_in_logics" checked="checked">
          @else
          <input type="checkbox" name="move_tasks_in_logics">
          @endif
          MoveTasksInLogicsToMgr
        </label>
      </div>

      <div class="checkbox">
        <label>
          @if($employee->release_sms === 1)
          <input type="checkbox" name="release_sms" checked="checked">
          @else
          <input type="checkbox" name="release_sms">
          @endif
          ReleaseSMS#inSpreadsheet
        </label>
      </div>

      <div class="checkbox">
        <label>
          @if($employee->set_logics_to_inactive === 1)
          <input type="checkbox" name="set_logics_to_inactive" checked="checked">
          @else
          <input type="checkbox" name="set_logics_to_inactive">
          @endif
          SetLogicsToInactive
        </label>
      </div>

      <div class="checkbox">
        <label>
          @if($employee->dis_empl_account === 1)
          <input type="checkbox" name="dis_empl_account" checked="checked">
          @else
          <input type="checkbox" name="dis_empl_account">
          @endif
          DisEmplAcct
        </label>
      </div>

      <div class="checkbox">
        <label>
          @if($employee->rel_ext === 1)
          <input type="checkbox" name="rel_ext" checked="checked">
          @else
          <input type="checkbox" name="rel_ext">
          @endif
          RelExt  
        </label>
      </div>

      <div class="checkbox">
        <label>
          @if($employee->check_mac === 1)
          <input type="checkbox" name="check_mac" checked="checked">
          @else
          <input type="checkbox" name="check_mac">
          @endif
          CheckMac 
        </label>
      </div>

      <div class="checkbox">
        <label>
          @if($employee->golive === 1)
          <input type="checkbox" name="golive" checked="checked">
          @else
          <input type="checkbox" name="golive">
          @endif
          UseGoLive
        </label>
      </div>

      <div class="checkbox">
        <label>
          @if($employee->removehylafax_account === 1)
          <input type="checkbox" name="removehylafax_account" checked="checked">
          @else
          <input type="checkbox" name="removehylafax_account">
          @endif
          DelHylaFAXAcct
        </label>

        <div class="checkbox">
          <label>
            @if($employee->printer_scanner === 1)
            <input type="checkbox" name="printer_scanner" checked="checked">
            @else
            <input type="checkbox" name="printer_scanner">
            @endif
            Printer/Scanner
          </label>
        </div>

        <div class="checkbox">
          <label>
            @if($employee->remove_scandocs_folder === 1)
            <input type="checkbox" name="remove_scandocs_folder" checked="checked">
            @else
            <input type="checkbox" name="remove_scandocs_folder">
            @endif
            RemfrmScanDocsFolder
          </label>
        </div>

        <div class="checkbox">
          <label>
            @if($employee->movedocs_autoimport === 1)
            <input type="checkbox" name="movedocs_autoimport" checked="checked">
            @else
            <input type="checkbox" name="movedocs_autoimport">
            @endif
            MoveDocs/RemAutoImport
          </label>
        </div>

        <div class="checkbox">
          <label>
            @if($employee->remove_docstar_inbox === 1)
            <input type="checkbox" name="remove_docstar_inbox" checked="checked">
            @else
            <input type="checkbox" name="remove_docstar_inbox">
            @endif
            Del DS Inbox
          </label>
        </div>

        <div class="checkbox">
          <label>
            @if($employee->remfrm_trueportal === 1)
            <input type="checkbox" name="remfrm_trueportal" checked="checked">
            @else
            <input type="checkbox" name="remfrm_trueportal">
            @endif
            RemFrmTruePortal
          </label>
        </div>

        <div class="checkbox">
          <label>
            @if($employee->remfrm_adt === 1)
            <input type="checkbox" name="remfrm_adt" checked="checked">
            @else
            <input type="checkbox" name="remfrm_adt">
            @endif
            RemfrmADT
          </label>
        </div>

        <div class="checkbox">
          <label>
            @if($employee->remfrm_website === 1)
            <input type="checkbox" name="remfrm_website" checked="checked">
            @else
            <input type="checkbox" name="remfrm_website">
            @endif
            RemfrmWebsite
          </label>
        </div>
      </div>
    </div>

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