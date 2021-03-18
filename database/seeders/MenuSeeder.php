<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            [
                'title' => 'Home',
                'route' => 'home'
            ],
            [
                'title' => 'About',
                'route' => 'about'
            ],
            [
                'title' => 'Shop',
                'route' => 'shop'
            ],
            [
                'title' => 'Contact',
                'route' => 'contact'
            ]
        ];

        foreach($links as $key => $link) {
            $menu = new Menu;

            $menu->title = $link['title'];
            $menu->route = $link['route'];
            $menu->order = $key;

            $menu->save();

        }

    }
}
