<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Season;

class ProductsSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $spring = Season::where('name', '春')->first();
        $summer = Season::where('name', '夏')->first();
        $autumn = Season::where('name', '秋')->first();
        $winter = Season::where('name', '冬')->first();

        $kiwi = Product::where('name', 'キウイ')->first();
        if ($kiwi && $autumn && $winter) {
            $kiwi->seasons()->attach([$autumn->id, $winter->id]);
        }

        $strawberry = Product::where('name', 'ストロベリー')->first();
        if ($strawberry && $spring) {
            $strawberry->seasons()->attach([$spring->id]);
        }

        $orange = Product::where('name', 'オレンジ')->first();
        if ($orange && $winter) {
            $orange->seasons()->attach([$winter->id]);
        }

        $watermelon = Product::where('name', 'スイカ')->first();
        if ($watermelon && $summer) {
            $watermelon->seasons()->attach([$summer->id]);
        }

        $peach = Product::where('name', 'ピーチ')->first();
        if ($peach && $summer) {
            $peach->seasons()->attach([$summer->id]);
        }

        $muscat = Product::where('name', 'シャインマスカット')->first();
        if ($muscat && $summer && $autumn) {
            $muscat->seasons()->attach([$summer->id, $autumn->id]);
        }

        $pineapple = Product::where('name', 'パイナップル')->first();
        if ($pineapple && $spring && $summer) {
            $pineapple->seasons()->attach([$spring->id, $summer->id]);
        }

        $grapes = Product::where('name', 'ブドウ')->first();
        if ($grapes && $summer && $autumn) {
            $grapes->seasons()->attach([$summer->id, $autumn->id]);
        }

        $banana = Product::where('name', 'バナナ')->first();
        if ($banana && $summer) {
            $banana->seasons()->attach([$summer->id]);
        }

        $melon = Product::where('name', 'メロン')->first();
        if ($melon && $spring && $summer) {
            $melon->seasons()->attach([$spring->id, $summer->id]);
        }
    }
}
