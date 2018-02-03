<?php

namespace App\Sms;

use Illuminate\Database\Eloquent\Model;

class SmsNumber extends Model
{
	protected $fillable = ['sms_number', 'assign_to', 'comment'];
	protected $table = 'sms_numbers';

	public function scopeSearch($query, $s) {
		return $query->where('sms_numbers.assign_to', function($q) use($s){
        $q->orWhere('sms_numbers.sms_number', 'like' , '%'.$s.'%');
    })->get();



	}
}
