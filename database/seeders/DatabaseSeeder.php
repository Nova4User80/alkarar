<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::create([
             'name'=>'aban',
             'password'=>Hash::make('stormos17'),
             'email'=>'aban@kec.com',
             'approved'=>true
         ]);
         \App\Models\User::create([
            'name'=>'Ahmed',
            'password'=>Hash::make('stormos17'),
            'email'=>'ahmed@kec.com',
            'approved'=>true
        ]);
         \App\Models\Project::create([
            'name'=>'TAR'
        ]);
        \App\Models\Project::create([
            'name'=>'FWKO'
        ]);
    }
}
