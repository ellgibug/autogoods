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
        $levels = ['Автокосметика', 'Автохимия', 'Аксессуары', 'Масла', 'Тех. жидкости', 'Расходные материалы', 'Инструмент',  'Запасные части по марке автомобиля', 'Товары для ТО'];

//        foreach ($levels as $k => $v){
//            DB::table('levels')->insert([
//                'name' => $v,
//                'parent_id' => $k+1,
//            ]);
//        }

        foreach ($levels as $k => $v){
            for ($i = 0; $i<10; $i++) {
                DB::table('levels')->insert([
                    'name' => $v .' '. $i,
                    'parent_id' => $k+1,
                ]);
            }
        }

    }
}
