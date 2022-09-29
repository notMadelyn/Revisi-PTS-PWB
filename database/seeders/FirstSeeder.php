<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Moneys;
use App\Models\Payments;
use App\Models\Transfer;
use App\Models\User;
use App\Models\Withdraws;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'robben',
            'email' => 'robben@gmail.com',
            'password' =>	'password',
            'rekening' => 6755312312

        ]);

        User::create([
            'name' => 'madelyn',
            'email' => 'madelyn@gmail.com',
            'password' =>	'password',
            'rekening' => 6755306456

        ]);

        User::create([
            'name' => 'ezackly',
            'email' => 'rezackly@gmail.com',
            'password' =>	'password',
            'rekening' => 5211412234

        ]);

        Bank::create([
            'rekening' => 6755312312,
            'money' => 1500000,
        ]);
        Bank::create([
            'rekening' => 6755306456,
            'money' => 1500000,
        ]);
        Bank::create([
            'rekening' => 5211412234,
            'money' => 1500000,
        ]);

        Transfer::create([
            'from_rekening' => 6755306456,
            'to_rekening' => 6755312312,
            'total' => 10000,
        ]);
        Transfer::create([
            'from_rekening' => 6755312312,
            'to_rekening' => 6755306456,
            'total' => 15000,
        ]);
        Transfer::create([
            'from_rekening' => 6755312312,
            'to_rekening' => 5211412234,
            'total' => 20000,
        ]);

        Withdraws::create([
            'rekening' => 6755312312,
            'total' => 100000,
        ]);
        Withdraws::create([
            'rekening' => 6755306456,
            'total' => 150000,
        ]);
        Withdraws::create([
            'rekening' => 6755312312,
            'total' => 200000,
        ]);

        Payments::create([
            'rekening' => 6755312312,
            'type' => 'pulsa',
            'no_payment' => "81388649406",
            'total' => 50000,
        ]);
        Payments::create([
            'rekening' => 6755306456,
            'type' => 'listrik',
            'no_payment' => "83123123133",
            'total' => 100000,
        ]);
        Payments::create([
            'rekening' => 6755312312,
            'type' => 'pulsa',
            'no_payment' => "81233113512",
            'total' => 250000,
        ]);



    }
}
