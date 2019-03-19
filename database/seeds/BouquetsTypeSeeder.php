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
        ]);
         DB::table('bouquet_types')->insert([
            'name' => 'Композиції',
        ]);
          DB::table('bouquet_sub_types')->insert([
            'name'    => '21, 51, 101 троянда',
            'type_id' => 1,
        ]);
         DB::table('bouquet_sub_types')->insert([
            'name'    => 'Букет з місцевої троянди',
            'type_id' => 1,
        ]);
         DB::table('bouquet_sub_types')->insert([
            'name'    => 'Букет з імпортної троянди',
            'type_id' => 1,
        ]);
         DB::table('bouquet_sub_types')->insert([
            'name'    => 'Композиція з місцевих квітів',
            'type_id' => 2,
        ]);
         DB::table('bouquet_sub_types')->insert([
            'name'    => 'Композиція з імпортних квітів',
            'type_id' => 2,
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
        DB::table('flower_categories')->insert([
            'name'    => 'троянда'
        ]);
        DB::table('flower_categories')->insert([
            'name'    => 'тюльпан'
        ]);
    }
}
