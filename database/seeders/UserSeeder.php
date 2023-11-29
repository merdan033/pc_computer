<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = ['Didar', 'Selim', 'Arslan'];

        foreach ($users as $user) {
            User::create([
                'name' => $user,
                'username' => str($user)->lower(),
                'password' =>bcrypt('somrthing'),
            ]);
        }
    }
}
