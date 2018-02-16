<?php

namespace App\Models\Accounts\Account;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
	protected $fillable = ['type_account', 'user_name', 'password', 'status'];
	protected $table = 'accounts';
}
