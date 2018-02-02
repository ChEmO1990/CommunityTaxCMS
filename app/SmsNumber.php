<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsNumber extends Model
{
	protected $fillable = ['sms_number', 'assign_to', 'comment'];
}
