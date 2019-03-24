<?php

use Illuminate\Database\Seeder;

class BouquetsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('bouquet_types')->insert([
            'name' => 'Звичані букети',
            'slug' => 'zvichayni-bukety'
        ]);
         DB::table('bouquet_types')->insert([
            'name' => 'Композиції',
            'slug' => 'kompozytsii'
        ]);
          DB::table('bouquet_sub_types')->insert([
            'name'    => '21, 51, 101 троянда',
            'type_id' => 1,
            'slug' => '21-51-101-troyandu'
        ]);
         DB::table('bouquet_sub_types')->insert([
            'name'    => 'Букет з місцевої троянди',
            'type_id' => 1,
            'slug' => 'buket-z-miscevoi-troyandu'
        ]);
         DB::table('bouquet_sub_types')->insert([
            'name'    => 'Букет з імпортної троянди',
            'type_id' => 1,
            'slug' => 'buket-z-importnoi-troyandu'
        ]);
         DB::table('bouquet_sub_types')->insert([
            'name'    => 'Композиція з місцевих квітів',
            'type_id' => 2,
            'slug' => 'kompozitsiya-z-miscevih-kvitiv'
        ]);
         DB::table('bouquet_sub_types')->insert([
            'name'    => 'Композиція з імпортних квітів',
            'type_id' => 2,
            'slug' => 'kompozitsiya-z-importnuh-kvitiv'
        ]);
         DB::table('sizes')->insert([
            'size'    => 'S',
            'count' => 21,
            'height' => 70,
            'diameter' =>50,
        ]);
         DB::table('sizes')->insert([
            'size'    => 'M',
            'count' => 35,
            'height' => 50,
            'diameter' =>40,
        ]);
         DB::table('bouquets')->insert([
            'name'    => '21 троянда',
            'sub_type_id' => 1,
            'description' => 'aaa'
        ]);
         DB::table('bouquets')->insert([
            'name'    => '51 троянда',
            'sub_type_id' => 1,
            'description' => 'aaa'
        ]);
         DB::table('bouquets')->insert([
            'name'    => 'Весна',
            'sub_type_id' => 4,
            'description' => 'aaa'
        ]);

         DB::table('bouquet_size')->insert([
            'bouquet_id'    => 1,
            'size_id' => 1,
            'price'=> 000,
        ]);
         DB::table('bouquet_size')->insert([
            'bouquet_id'    => 2,
            'size_id' => 1,
            'price'=> 111,
        ]);
        DB::table('bouquet_size')->insert([
            'bouquet_id'    => 3,
            'size_id' => 1,
            'price'=> 221,
        ]);
        DB::table('flower_categories')->insert([
            'name'    => 'Звичайна троянда',
            'slug'    => 'zvichayna-troyanda'
        ]);
        DB::table('flower_categories')->insert([
            'name'    => 'Піоновидна троянда',
            'slug'    => 'pionovidna-troyanda'
        ]);
        DB::table('flower_categories')->insert([
            'name'    => 'Тюльпани',
            'slug'    => 'tullips'
        ]);
        DB::table('flower_categories')->insert([
            'name'    => 'Хризантеми',
            'slug'    => 'hryzantemu'
        ]);
    }
}
