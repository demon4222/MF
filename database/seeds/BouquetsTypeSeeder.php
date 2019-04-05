<?php

use Illuminate\Database\Seeder;
use App\Models\BouquetSubType;
use App\Models\BouquetType;
use App\Models\FlowerCategory;
use App\Models\Bouquet;

class BouquetsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BouquetType::create([
            'name' => 'Звичані букети',
        ]);
        BouquetType::create([
            'name' => 'Композиції',
        ]);
        BouquetSubType::create([
            'name'    => 'Букети з місцевої троянди',
            'type_id' => 1,
        ]);
        BouquetSubType::create([
            'name'    => 'Букети з імпортної троянди',
            'type_id' => 1,
        ]);
         BouquetSubType::create([
             'name'    => 'Букети з кущової троянди',
             'type_id' => 1,
         ]);
        BouquetSubType::create([
            'name'    => 'Букети з інших сортів',
            'type_id' => 1,
        ]);
        BouquetSubType::create([
            'name'    => 'Букети з використанням зелені',
            'type_id' => 1,
        ]);
        BouquetSubType::create([
            'name'    => 'Композиція з місцевих квітів',
            'type_id' => 2,
        ]);
        BouquetSubType::create([
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
        Bouquet::create([
            'name'    => 'Весна',
            'sub_type_id' => 4,
            'description' => 'aaa'
        ]);
        Bouquet::create([
            'name'    => 'Чарівність',
            'sub_type_id' => 1,
            'description' => 'aaa'
        ]);
        Bouquet::create([
            'name'    => 'Ніжність',
            'sub_type_id' => 2,
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
        FlowerCategory::create([
            'name'    => 'Звичайна троянда',
        ]);
        FlowerCategory::create([
            'name'    => 'Піоновидна троянда',
        ]);
        FlowerCategory::create([
            'name'    => 'Тюльпани',
        ]);
        FlowerCategory::create([
            'name'    => 'Хризантеми',
        ]);
    }
}
