<?php

namespace App\SmsNumber;

use Illuminate\Database\Eloquent\Model;

class SmsNumber extends Model
{
	protected $fillable = ['sms_number', 'assign_to', 'comment'];

	public function scopeSearch($query, $s) {
		return $query->where('assign_to', 'like', '%' .$s. '%');
	}
}
