<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Mohammed Alagha',
            'email' => 'alagha2013@gmail.com',
            'password' => '123456789'
        ]);
    }
}
