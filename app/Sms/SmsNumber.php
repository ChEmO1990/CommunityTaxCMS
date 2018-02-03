<?php

namespace App\Sms;

use Illuminate\Database\Eloquent\Model;

class SmsNumber extends Model
{
	protected $fillable = ['sms_number', 'assign_to', 'comment'];
	protected $table = 'sms_numbers';

	public function scopeSearch($query, $s) {
		return $query
		->where('sms_numbers.assign_to', 'LIKE', "%" .$s. "%");
	}
}
