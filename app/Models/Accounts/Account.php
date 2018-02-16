<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	const TYPE_PERSONAL_ACCOUNT = 'personal_account';
	const TYPE_3CLOGICS_ACCOUNT = '3c_logics';
	const TYPE_LOGICS_ACCOUNT = 'logics';
	const TYPE_OUTLOOK_ACCOUNT = 'outlook';
	const TYPE_SPARK_ACCOUNT = 'spark';
	const TYPE_HYLAFAX_ACCOUNT = 'hylafax';
	const TYPE_PHONESYSTEM_ACCOUNT = 'phonesystem';
	const TYPE_DOCSTAR_ACCOUNT = 'docstar';
	
	const DEFAULT_PASSWORD = 'Ctaxit17!';
	const DEFAULT_PASSWORD_SPARK = '5555';

	protected $fillable = ['type_account', 'user_name', 'password', 'status'];
	protected $table = 'accounts';
}
