<?php

namespace App\Transformers;

use App\Models\Employees\Employee;
use League\Fractal\TransformerAbstract;

class EmployeeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Employee $employee)
    {
        return [
            'id' => (int)$employee->id,
            'name' => (string)$employee->name,
            'network_account' => (string)$employee->network_account,
            'email' => (string)$employee->email,
            'manager' => (string)$employee->manager,
            'clone_account' => (string)$employee->clone_account,
            'location' => (string)$employee->location,
            'job_title' => (string)$employee->job_title,
            'start_date' => (string)$employee->start_date,
            'status' => (string)$employee->status,
            'did' => (string)$employee->did,
            'ext' => (string)$employee->ext,
            'clogics_account' => (string)$employee->clogics_account,
            'logics_account' => (string)$employee->logics_account,
            'assign_logics_sms' => (string)$employee->assign_logics_sms,
            'tax_preparer_udfid' => (string)$employee->tax_preparer_udfid,
            'tax_preparers_eas' => (string)$employee->tax_preparers_eas,
            'ifax_account' => (string)$employee->ifax_account,
            'spark_account' => (string)$employee->spark_account,
            'ds_account' => (string)$employee->ds_account,
            'user_to_scanner' => (string)$employee->user_to_scanner,
            'term_date' => (string)$employee->term_date,
            'fwd_to_name' => (string)$employee->fwd_to_name,
            'fwd_to_ext' => (string)$employee->fwd_to_ext,
            'fwd_to_mail' => (string)$employee->fwd_to_mail,
            'run_script' => (string)$employee->run_script,
            'delete_app_calendar' => (string)$employee->delete_app_calendar,
            'move_tasks_in_logics' => (string)$employee->move_tasks_in_logics,
            'release_sms' => (string)$employee->release_sms,
            'set_logics_to_inactive' => (string)$employee->set_logics_to_inactive,
            'dis_empl_account' => (string)$employee->dis_empl_account,
            'check_mac' => (string)$employee->check_mac,
            'golive' => (string)$employee->golive,
            'removehylafax_account' => (string)$employee->removehylafax_account,
            'prstringer_scanner' => (string)$employee->prstringer_scanner,
            'remove_scandocs_folder' => (string)$employee->remove_scandocs_folder,
            'movedocs_autoimport' => (string)$employee->movedocs_autoimport,
            'remove_docstar_inbox' => (string)$employee->remove_docstar_inbox,
            'remfrm_trueportal' => (string)$employee->remfrm_trueportal,
            'remfrm_adt' => (string)$employee->remfrm_adt,
            'remfrm_website' => (string)$employee->remfrm_website,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'network_account' => 'network_account',
            'email' => 'email',
            'manager' => 'manager',
            'clone_account' => 'clone_account',
            'location' => 'location',
            'job_title'=> 'job_title',
            'start_date' => 'start_date',
            'status' => 'status',
            'did' => 'did',
            'ext' => 'ext',
            'clogics_account' => 'clogics_account',
            'logics_account' => 'logics_account',
            'assign_logics_sms' => 'assign_logics_sms',
            'tax_preparer_udfid' => 'tax_preparer_udfid',
            'tax_preparers_eas' => 'tax_preparers_eas',
            'ifax_account' => 'ifax_account',
            'spark_account' => 'spark_account',
            'ds_account' => 'ds_account',
            'user_to_scanner' => 'user_to_scanner',
            'term_date' => 'term_date',
            'fwd_to_name' => 'fwd_to_name',
            'fwd_to_ext' => 'fwd_to_ext',
            'fwd_to_mail' => 'fwd_to_mail',
            'run_script' => 'run_script',
            'delete_app_calendar' => 'delete_app_calendar',
            'move_tasks_in_logics' => 'move_tasks_in_logics',
            'release_sms' => 'release_sms',
            'set_logics_to_inactive' => 'set_logics_to_inactive',
            'dis_empl_account' => 'dis_empl_account',
            'check_mac' => 'check_mac',
            'golive' => 'golive',
            'removehylafax_account' => 'removehylafax_account',
            'prstringer_scanner' => 'prstringer_scanner',
            'remove_scandocs_folder' => 'remove_scandocs_folder',
            'movedocs_autoimport' => 'movedocs_autoimport',
            'remove_docstar_inbox' => 'remove_docstar_inbox',
            'remfrm_trueportal' => 'remfrm_trueportal',
            'remfrm_adt' => 'remfrm_adt',
            'remfrm_website' => 'remfrm_website',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
