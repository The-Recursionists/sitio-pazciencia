<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(100)->create();
        User::insert([
            'name'              => 'Admin Admin',
            'email'             => 'admin@argon.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('secret'),
            'created_at'        => now(),
            'updated_at'        => now(),
            'role_id'           => Role::all()->first()->id,
            'area_id'           => Area::all()->first()->id,
        ]);
    }
}
