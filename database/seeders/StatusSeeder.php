<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name'=>[
                'uz'=>'Yangi',
                'en'=>'New',
            ],
            'code'=>'new',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>'Tasdiqlandi',
                'en'=>'Confirmed',
            ],
            'code'=>'confirmed',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>'Jarayonda',
                'en'=>'Processing',
            ],
            'code'=>'processing',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>'Yetkazib berilmoqda',
                'en'=>'Shipping',
            ],
            'code'=>'shipping',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>'Yetkazib berildi',
                'en'=>'Delivered',
            ],
            'code'=>'delivered',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>"To'lov kutulmoqda",
                'en'=>'Waiting Payment',
            ],
            'code'=>'waiting_payment',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>'Tugatildi',
                'en'=>'Completed',
            ],
            'code'=>'completed',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>'Yopildi',
                'en'=>'Closed',
            ],
            'code'=>'closed',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>"To'landi",
                'en'=>'Paid',
            ],
            'code'=>'paid',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>'Bekor qilindi',
                'en'=>'Canceled',
            ],
            'code'=>'canceled',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>'Qaytarib berildi',
                'en'=>'Refunded',
            ],
            'code'=>'refunded',
            'for'=>'order'
        ]);
        Status::create([
            'name'=>[
                'uz'=>"To'lovda Xatolik",
                'en'=>'Payment Error',
            ],
            'code'=>'payment_error',
            'for'=>'order'
        ]);
    }
}
