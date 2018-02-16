<?php

namespace App\Models\Employees;

use App\Models\Accounts\Account;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = [
		'id',
		'name', 
		'network_account',
		'email',
		'clone_account',
		'location',
		'job_title',
		'start_date',
		'status',
		'did',
		'ext',
		'clogics_account',
		'logics_account',
		'assign_logics_sms',
		'tax_preparer_udfid',
		'tax_preparers_eas',
		'ifax_account',
		'spark_account',
		'ds_account',
		'user_to_scanner',
		'term_date',
		'fwd_to_name',
		'fwd_to_ext',
		'fwd_to_mail',
		'run_script',
		'delete_app_calendar',
		'move_tasks_in_logics',
		'release_sms',
		'set_logics_to_inactive',
		'dis_empl_account',
		'check_mac',
		'golive',
		'printer_scanner',
		'remove_scandocs_folder',
		'movedocs_autoimport',
		'remfrm_trueportal',
		'remfrm_adt',
		'remfrm_website'
	];
	protected $table = 'employees';

	public function scopeSearch($query, $s) {
		$temp = $query->where('employees.name', 'like', '%' .$s. '%');
			info($temp->toSql());
			return $temp;
	}

	public function accounts() {
		return $this->hasMany(Account::class);
	}
}