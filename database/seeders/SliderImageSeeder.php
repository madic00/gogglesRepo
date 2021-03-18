<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SliderImage;

class SliderImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $headings = ["Men's eyewear", "Women's eyewear", "Men's eyewear", "Women's eyewear"];
        $subs = ["Cool summer sale 50% off", "Want to Look Your Best?", "Cool summer sale 50% off", "Want to Look Your Best?"];

        for($i = 1; $i <= 4; $i++) {
            $image = new SliderImage;

            $image->image = "banner$i.jpg";
            $image->active = 1;
            $image->heading = $headings[$i - 1];
            $image->subheading = $subs[$i - 1];
            $image->gender_id = $i % 2; // 1 je musko, 0 je zensko

            $image->save();
        
        }
    }
}
