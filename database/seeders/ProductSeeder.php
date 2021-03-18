<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['amore', 'elle', 'kiri', 'lauren', 'linger', 'lulu', 'nostalgia', 'rollin'];

        $descriptions = [
            "You’ll be ready for fun in the sun with stunning Sun Amore in Black. With heart-shaped rimless lenses, these sunnies give you maximum visibility and maximum cool. With adjustable nose pads for the perfect fit, what’s not to love?",
            "If glamorous had a picture in the dictionary, it would show Elle. Perfectly oversized, but never over-the-top, these timeless tortoiseshell sunnies make you wanna say “ooo-la-la.” Oval in shape, and slightly elongated in the top corners for an almost cat-eye style that’s full of charm and always ready for the camera.",
            "Face the world with eyes wide-open. Kiri's round lenses, metal nose bridge, and classic Black finish make it an urban hit you don't want to miss.",
            "Add some vintage flair to your style with these tortoise sunglasses. This oval shaped frame features a glossy semi-transparent tortoiseshell frame front reminiscent of old Hollywood glamour. Gold metal temples add a modern twist to a classic that channels Audrey and Jackie O, while acetate arm tips means you won.",
            "With a feline look that will leave you feeling fine, Linger??s jet black rimless cat eye sunglasses are the perfect fit for ladies with an eye for style. Upscale and luxe, with spring hinges, adjustable nose pads, and tortoise temple tips, you??ll be wanting to wear these beauties into the night.",
            "Show off your retro style with these black eyeglasses. The perfect combination of metal and plastic, this frame features a glossy black plastic frame front and arm tips paired with silver metal temples and nose bridge. Oval shaped lenses complete the look.",
            "The future is bright for these nostalgic caramel eyeglasses. This preppy frame is hand made from premium acetate in a glamorous semi-transparent marbled honey finish and fused with high-end Italian hinges. A detailed metal nose bridge and double stud accents add a preppy panache to this dazzling Tokyo-inspired look that glorifies your fusing passions for traditional culture and everything new.",
            "Aspiring rock stars and accomplished beach bums alike will find themselves rockin' and Rollin' in these iconic round sunglasses. The fun, funky tortoise rims dish up a little unexpected flavor, while the slick metal hardware keep things classic."
        ];
        

        foreach($names as $key => $name) {
            $product = new Product;

            $product->name = ucfirst($name);
            $product->image = $name . "1.jpg";
            $product->description = $descriptions[$key];
            $product->category_id = 2;
            $product->featured = rand(0,1);
            $product->gender_id = 0;
            $product->brand_id = rand(1,6);

            $product->save();

            $price = new Price;
            $price->product_id = $product->id;
            $price->price = rand(60, 600);
            $price->save();

            for($j = 2; $j <= 3; $j++) {
                // ImageUpload::upload($name, $request->image2)
                Image::create(['image' => $name . "$j.jpg", 'product_id' => $product->id]);
            }

        }
    }
}
