<?php

namespace App\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	const TYPE_PERSONAL_ACCOUNT = 'Personal Account';
	const TYPE_3CLOGICS_ACCOUNT = '3CLogics';
	const TYPE_LOGICS_ACCOUNT = 'Logics';
	const TYPE_OUTLOOK_ACCOUNT = 'Email';
	const TYPE_SPARK_ACCOUNT = 'Spark';
	const TYPE_HYLAFAX_ACCOUNT = 'Hylafax';
	const TYPE_PHONESYSTEM_ACCOUNT = 'PhoneSystem';
	const TYPE_DOCSTAR_ACCOUNT = 'DocStar';
	
	const DEFAULT_PASSWORD = 'Ctaxit17!';
	const DEFAULT_3CLOGICS_PASSWORD = '3c2017$$$';
	const DEFAULT_PASSWORD_SPARK = '5555';

	protected $fillable = ['type_account', 'user_name', 'password', 'status'];
	protected $table = 'accounts';
}