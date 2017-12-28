<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $levels = ['Автокосметика', 'Автохимия', 'Аксессуары', 'Масла и техжидкости', 'Расходные материалы', 'Инструмент',  'Запчасти', 'Товары для ТО'];

        foreach ($levels as $level){
            DB::table('levels')->insert([
                'name' => $level,
                'parent_id' => null,
            ]);
        }

        DB::table('levels')->insert([
            'name' => 'Тормозные диски и колодки',
            'parent_id' => 7,
        ]);

        DB::table('levels')->insert([
            'name' => 'Масла моторные для автомобилей',
            'parent_id' => 4,
        ]);

        DB::table('levels')->insert([
            'name' => 'Автомобильные ковры',
            'parent_id' => 3,
        ]);

        DB::table('levels')->insert([
            'name' => 'Тормозные диски',
            'parent_id' => 9,
        ]);

        DB::table('levels')->insert([
            'name' => 'Оригинальные масла',
            'parent_id' => 10,
        ]);

        DB::table('levels')->insert([
            'name' => 'Ковры салонные и в багажник',
            'parent_id' => 11,
        ]);

//        foreach ($levels as $k => $v){
//            for ($i = 0; $i<10; $i++) {
//                DB::table('levels')->insert([
//                    'name' => $v .' '. $i,
//                    'parent_id' => $k+1,
//                ]);
//            }
//        }

    }
}
