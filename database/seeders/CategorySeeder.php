<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>[
                'uz'=>'Stol',
                'en'=>'Table'
            ]
        ]);

        Category::create([
            'name'=>[
                'uz'=>'Divan',
                'en'=>'Sofa'
            ]
        ]);

        $category=Category::create([
            'name'=>[
                'uz'=>'Kreslo',
                'en'=>'Armchair'
            ]
        ]);
        $category->childCategories()->create([
            'name'=>[
                'uz'=>'Offis',
                'en'=>'Office'
            ]
        ]);
        $childCategory=$category->childCategories()->create([
            'name'=>[
                'uz'=>"O'yin uchun",
                'en'=>'Gaming'
            ]
        ]);

        $childCategory->childCategories()->create([
            'name'=>[
                'uz'=>"RGB",
                'en'=>'RGB'
            ]
        ]);
        $childCategory->childCategories()->create([
            'name'=>[
                'uz'=>"Ayollar uchun",
                'en'=>'Women'
            ]
        ]);
        $childCategory->childCategories()->create([
            'name'=>[
                'uz'=>"Qora",
                'en'=>'Black'
            ]
        ]);
        $category->childCategories()->create([
            'name'=>[
                'uz'=>"Yumshoq",
                'en'=>'Soft'
                ]
        ]);

        Category::create([
            'name'=>[
                'uz'=>'Yotoq',
                'en'=>'Bed'
            ]
        ]);

        Category::create([
            'name'=>[
                'uz'=>'Stul',
                'en'=>'Chair'
            ]
        ]);
    }
}
