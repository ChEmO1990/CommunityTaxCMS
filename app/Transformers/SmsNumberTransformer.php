<?php

namespace App\Transformers;

use App\Models\Sms\SmsNumber;
use League\Fractal\TransformerAbstract;

class SmsNumberTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(SmsNumber $sms)
    {
        return [
            'sms_number_id' => (int)$sms->id,
            'number' => (string)$sms->sms_number,
            'owner' => (string)$sms->assign_to,
            'comment' => (string)$sms->comment,
            'isAvailable' => (boolean)$sms->status,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'sms_number_id' => 'id',
            'number' => 'sms_number',
            'owner' => 'assign_to',
            'comment' => 'comment',
            'isAvailable' => 'status',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
