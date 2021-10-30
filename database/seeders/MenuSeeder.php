<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{

    protected $menu = [
        "kh" => [
            "yakh" => [
                "2gh",
                "side"
            ],
            "ojagh"
        ],
        "digital"
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Menu::count() == 0) {
            $menu1 = Menu::create(['name' => 'لوازم خانه']);
            $menu2 = Menu::create(['name' => 'کالای دیجیتال']);
            $menu3 = Menu::create(['name' => ' لوازم ورزشی']);
            $menu4 = Menu::create(['name' => 'سوپرمارکت ']);

            $submenu1 = $menu1->children()->create(['name' => 'یخچال']);
            $submenu2 = $menu1->children()->create(['name' => 'اجاق']);
            $submenu3 = $menu1->children()->create(['name' => 'تی وی']);
            $submenu4 = $menu1->children()->create(['name' => 'مبل']);
            $submenu5 = $menu1->children()->create(['name' => 'فرش']);

            $submenu1->children()->create(['name' => 'دوقلو']);
            $submenu1->children()->create(['name' => 'ساید']);
            $submenu2->children()->create(['name' => 'فر']);
            $submenu2->children()->create(['name' => 'طرح فر']);
            $submenu3->children()->create(['name' => 'led']);
            $submenu3->children()->create(['name' => 'lcd']);
        }
    }
}
