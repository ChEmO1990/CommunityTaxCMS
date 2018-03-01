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

               <!-- Checklist active user -->
              <br/>

              <div class="col-xs-12 table-responsive">
                <h2 class="page-header">
                  <i class="fa fa-check-square-o"></i> CheckList
                </h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Status</th>
                      <tr>
                        <tr>  
                          <td>Create 3CLogics Account</td>
                          <td>
                            @if($employee->clogics_account === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Create Logics Account</td>
                          <td>
                            @if($employee->logics === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Assign Logics SMS</td>
                          <td>
                            @if($employee->assign_logics_sms === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>If Tax Preparer add to UDFID 102 in IRSLogics</td>
                          <td>
                            @if($employee->tax_preparer_udfid === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Prog Mon for Tax Preps, EA's, and Negotiators</td>
                          <td>
                            @if($employee->tax_preparer_eas === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Create I-Fax Account</td>
                          <td>
                            @if($employee->ifax_account === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Create Spark Account</td>
                          <td>
                            @if($employee->spark_account === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Create DS Acct, Inbox, Auto Import</td>
                          <td>
                            @if($employee->docstar === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Add User to Scanner/Fax/Printers</td>
                          <td>
                            @if($employee->user_scanner === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
              <!-- /.col -->
            </div>
            @else
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <h2 class="page-header">
                  <i class="fa fa-check-square-o"></i> CheckList
                </h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Status</th>
                      <tr>
                        <tr>  
                          <td>Run Script</td>
                          <td>
                            @if($employee->remfrm_website === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Delete Appt Calendar</td>
                          <td>
                            @if($employee->delete_app_calendar === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>MoveTasksInLogicsToMgr</td>
                          <td>
                            @if($employee->move_tasks_in_logics === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>ReleaseSMS#inSpreadsheet</td>
                          <td>
                            @if($employee->release_sms === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>SetLogicsToInactive</td>
                          <td>
                            @if($employee->set_logics_to_inactive === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>DisEmplAcct</td>
                          <td>
                            @if($employee->dis_empl_account === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>RelExt</td>
                          <td>
                            @if($employee->rel_ext === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>CheckMac</td>
                          <td>
                            @if($employee->check_mac === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>UseGoLive</td>
                          <td>
                            @if($employee->golive === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>DelHylaFAXAcct</td>
                          <td>
                            @if($employee->removehylafax_account === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Printer/Scanner</td>
                          <td>
                            @if($employee->printer_scanner === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>RemfrmScanDocsFolder</td>
                          <td>
                            @if($employee->remove_scandocs_folder === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>MoveDocs/RemAutoImport</td>
                          <td>
                            @if($employee->movedocs_autoimport === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>Del DS Inbox</td>
                          <td>
                            @if($employee->remove_docstar_inbox === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>RemFrmTruePortal</td>
                          <td>
                            @if($employee->remfrm_trueportal === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>RemfrmADT</td>
                          <td>
                            @if($employee->remfrm_adt === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
                          </tr>

                          <tr>  
                          <td>RemfrmWebsite</td>
                          <td>
                            @if($employee->remfrm_website === 1)
                              <span class="label label-success">Checked</span>
                            @else
                              <span class="label label-danger">Not Checked</span>
                            @endif
                          </td>
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
                      @if( $employee->status == 1 ) 
                      <a href="{{ route('employees.edit',['id' => $employee->id, 'termination' => true]) }}">
                        <button type="button" class="btn btn-danger pull-right">Termination</button>
                      </a>

                      <a href="{{ route('employees.edit',['id' => $employee->id, 'termination' => false]) }}">
                        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">Edit Information</button>
                      </a>

                      <a href="{{ action('Download\DownloadController@downloadPDF', $employee->id) }}">
                        <button type="button" class="btn btn-success pull-right" style="margin-right: 5px;">Generate PDF</button>
                      </a>
                      @else
                      <a href="{{ route('employees.edit',['id' => $employee->id, 'termination' => false]) }}">
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