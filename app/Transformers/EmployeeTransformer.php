<?php

namespace App\Transformers;

use App\Models\Employees\Employee;
use League\Fractal\TransformerAbstract;

class EmployeeTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Employee $employee)
    {
        return [
            'id' => (int)$employee->id,
            'name' => (string)$employee->name,
            'network_account' => (string)$employee->network_account,
            'email' => (string)$employee->email,
            'manager' => (string)$employee->manager,
            'clone_account' => (string)$employee->clone_account,
            'location' => (string)$employee->location,
            'job_title' => (string)$employee->job_title,
            'start_date' => (string)$employee->start_date,
            'status' => (string)$employee->status,
            'did' => (string)$employee->did,
            'ext' => (string)$employee->ext,
        ];
    }

    public static function originalAttribute($index) {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'network_account' => 'network_account',
            'email' => 'email',
            'manager' => 'manager',
            'clone_account' => 'clone_account',
            'location' => 'location',
            'job_title'=> 'job_title',
            'start_date' => 'start_date',
            'status' => 'status',
            'did' => 'did',
            'ext' => 'ext',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
