<?php

use App\User;
use App\SmsNumber;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	User::truncate();
    	SmsNumber::truncate();

    	$cantidadUsuarios = 100;
    	$cantidadSms = 200;

    	factory(User::class, $cantidadUsuarios)->create();
    	factory(SmsNumber::class, $cantidadSms)->create();
    }
}
