<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->string('network_account');
            $table->string('email');
            $table->string('clone_account');
            $table->string('location');
            $table->string('job_title');
            $table->string('start_date');
            $table->boolean('status')->default(true);
            $table->string('did')->nullable();
            $table->string('ext')->nullable();

            $table->boolean('clogics_account')->default(false);
            $table->boolean('logics_account')->default(false);
            $table->boolean('assign_logics_sms')->default(false);
            $table->boolean('tax_preparer_udfid')->default(false);
            $table->boolean('tax_preparers_eas')->default(false);
            $table->boolean('ifax_account')->default(false);
            $table->boolean('spark_account')->default(false);
            $table->boolean('ds_account')->default(false);
            $table->boolean('user_to_scanner')->default(false);

            $table->string('term_date')->nullable();
            $table->string('position')->nullable();
            $table->string('fwd_to_name')->nullable();
            $table->string('fwd_to_ext')->nullable();
            $table->string('fwd_to_mail')->nullable();

            $table->boolean('run_script')->default(false);
            $table->boolean('delete_app_calendar')->default(false);
            $table->boolean('move_tasks_in_logics')->default(false);
            $table->boolean('release_sms')->default(false);
            $table->boolean('set_logics_to_inactive')->default(false); 
            $table->boolean('dis_empl_account')->default(false); 
            $table->boolean('check_mac')->default(false); 
            $table->boolean('golive')->default(false); 
            $table->boolean('removehylafax_account')->default(false); 
            $table->boolean('printer_scanner')->default(false); 
            $table->boolean('remove_scandocs_folder')->default(false); 
            $table->boolean('movedocs_autoimport')->default(false); 
            $table->boolean('remove_docstar_inbox')->default(false); 
            
            $table->boolean('remfrm_trueportal')->default(false); 
            $table->boolean('remfrm_adt')->default(false); 
            $table->boolean('remfrm_website')->default(false); 

            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
