<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::find(2)->user_addresses()->create([
            "latitude"=>"40.541035",
            "longtitude"=>"70.962886",
            "region"=>"Fargʻona",
            "district"=>"Qoʻqon",
            "street"=>"Bunyodkor mahalla fuqarolar yigʻini",
            "home"=>"286"
        ]);
        
    }
}
