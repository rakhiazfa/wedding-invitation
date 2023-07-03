<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Ginanjar Mugi Widodo',
            'username' => 'ginanjar0823',
            'email' => 'ginanjar0823@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        $customer = new Customer([
            'name' => 'Ginanjar Mugi Widodo',
        ]);
        $customer->user()->associate($user);
        $customer->save();
    }
}
