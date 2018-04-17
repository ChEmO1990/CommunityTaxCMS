<?php

namespace App\Models\Sms;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\SmsNumberTransformer;

class SmsNumber extends Model
{
	public $transformer = SmsNumberTransformer::class;
	
	protected $fillable = ['id', 'sms_number', 'assign_to', 'comment', 'status'];
	protected $table = 'sms_numbers';

	public function scopeSearch($query, $s) {
		$temp = $query->where('sms_numbers.assign_to', 'like', '%' .$s. '%')
			->orWhere('sms_numbers.sms_number', 'like', '%' .$s. '%');
			info($temp->toSql());
			return $temp;
	}
}
