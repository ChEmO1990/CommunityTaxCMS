@extends('layouts.app')

@section('content')
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
    <div class="panel-body" id="app">
        {!! Form::open(array('route'=>'employees.store')) !!}

        <div class="form-group">
            {!! Form::label('name', 'Full Name') !!} 
            {!! Form::text('name', null, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
            <label for="name">Network Account</label> 
            <input class="form-control" name="network_account" type="text" id="network_account" v-model="network_account" >  
        </div>

        <div class="form-group">
            <label for="name">Email</label> 
            <input class="form-control" name="email" type="text" :value="autocomplete_email">  
        </div>

        <div class="form-group">
            {!! Form::label('manager', 'Manager') !!} 
            {!! Form::text('manager', null, ['class'=>'form-control']) !!}  
        </div>
        
        <div class="form-group">
            {!! Form::label('clone_account', 'Clone Account') !!} 
            {!! Form::text('clone_account', null, ['class'=>'form-control']) !!}  
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
            {!! Form::text('job_title', null, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
            {!! Form::label('did', 'DID') !!} 
            {!! Form::text('did', null, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
            {!! Form::label('ext', 'Extension') !!} 
            {!! Form::text('ext', null, ['class'=>'form-control']) !!}  
        </div>

        <div class="form-group">
            <label>Start Date:</label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input name="start_date" type="text" class="form-control pull-right" id="datepicker" data-provide="datepicker">
            </div>
        </div>

        <div class="form-group with-border">
            <h3 class="box-title">Checklist</h3>
            
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="clogics_account">
                    Create 3CLogics Account
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="logics">
                    Create Logics Account
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="assign_logics_sms">
                    Assign Logics SMS
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tax_preparer_udfid">
                    If Tax Preparer add to UDFID 102 in IRSLogics
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tax_preparer_eas">
                    Prog Mon for Tax Preps, EA's, and Negotiators
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="ifax_account">
                    Create I-Fax Account    
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="spark_account">
                    Create Spark Account 
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="docstar">
                    Create DS Acct, Inbox, Auto Import
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="user_scanner">
                    Add User to Scanner/Fax/Printers
                </label>
            </div>
        </div>

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                {!! Form::button('Create Employee', ['type'=>'submit', 'class'=>'btn btn-primary pull-right']) !!} 
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</section>

<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script>
    new Vue({
        el: '#app',
        data: function(){
            return {
                network_account: '',
                to_email: '@communitytax.com'
            };
        },

        computed: {
            autocomplete_email: function() {
                return (this.network_account) + (this.to_email);
            }
        }
    });
</script>
<!-- /.content -->
@endsection