<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'name'=>[
                'uz'=>'Naxt',
                'en'=>'Cash',
            ]
        ]);
        PaymentType::create([
            'name'=>[
                'uz'=>'Terminal',
                'en'=>'Terminal',
            ]
        ]);
        PaymentType::create([
            'name'=>[
                'uz'=>'Payme',
                'en'=>'Payme',
            ]
        ]);
        PaymentType::create([
            'name'=>[
                'uz'=>'Click',
                'en'=>'Click',
            ]
        ]);
        PaymentType::create([
            'name'=>[
                'uz'=>'Uzum',
                'en'=>'Uzum',
            ]
        ]);
    }
}
