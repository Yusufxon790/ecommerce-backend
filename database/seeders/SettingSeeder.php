<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use App\Enums\SettingType;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting=Setting::create([
            'name'=>[
                'uz'=>'Til',
                'en'=>'Language'
            ],
            'type'=>SettingType::SELECT,
        ]);

        $setting->values()->create([
            'name'=>[
                'uz'=>"O'zbekcha",
                'en'=>'Uzbek'
            ]
        ]);
        $setting->values()->create([
            'name'=>[
                'uz'=>"Inglizcha",
                'en'=>'English'
            ]
        ]);

        $setting=Setting::create([
            'name'=>[
                'uz'=>'Pul birligi',
                'en'=>'Currency'
            ],
            'type'=>SettingType::SELECT,
        ]);

        $setting->values()->create([
            'name'=>[
                'uz'=>"So'm",
                'en'=>'Sum'
            ]
        ]);
        $setting->values()->create([
            'name'=>[
                'uz'=>"Dollar",
                'en'=>'Dollar'
            ]
        ]);

        $setting=Setting::create([
            'name'=>[
                'uz'=>'Tungi Rejim',
                'en'=>'Dark Mode'
            ],
            'type'=>SettingType::SWITCH,
        ]);

        $setting=Setting::create([
            'name'=>[
                'uz'=>'Xabarnomalar',
                'en'=>'Notifications'
            ],
            'type'=>SettingType::SWITCH,
        ]);
    }
}
