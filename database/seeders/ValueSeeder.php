<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Value;
use App\Models\Attribute;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $attribute=Attribute::find(1);

        $attribute->values()->create([
            "name"=>[
                "uz"=>"Qizil",
                "en"=>"Red"
            ]
        ]);
        $attribute->values()->create([
            "name"=>[
                "uz"=>"Qora",
                "en"=>"Black"
            ]
        ]);
        $attribute->values()->create([
            "name"=>[
                "uz"=>"Kulrang",
                "en"=>"Grey"
            ]
        ]);

        $attribute=Attribute::find(2);

        $attribute->values()->create([
            "name"=>[
                "uz"=>"MDF",
                "en"=>"MDF"
            ]
        ]);

        $attribute->values()->create([
            "name"=>[
                "uz"=>"LOSP",
                "en"=>"LOSP"
            ]
        ]);
    }
}
