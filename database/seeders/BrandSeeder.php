<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = ['Ray-Ban', 'Oakley', 'Mario Rossi', 'Gucci', 'Mont Blanc', 'O. Carrera'];

        foreach($brands as $brand) {
            \DB::table('brands')->insert(['brand_name' => $brand]);
        }
    }
}
