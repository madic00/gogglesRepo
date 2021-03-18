<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Eyeglasses', 'Sunglasses', 'Contact lens'];

        foreach($categories as $category) {
            DB::table('categories')->insert(['category_name' => $category]);
        }
    }
}
