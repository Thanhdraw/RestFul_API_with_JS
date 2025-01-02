<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {


        Customer::create([
            'name' => 'Nguyễn Văn C',
            'email' => 'customer3@example.com',

            'password' => bcrypt('password123'),
        ]);
        // Bạn có thể thêm nhiều customer khác ở đây...
    }
}
