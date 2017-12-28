<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $levels = ['Автокосметика', 'Автохимия', 'Аксессуары', 'Масла', 'Тех. жидкости', 'Расходные материалы', 'Инструмент',  'Запасные части по марке автомобиля', 'Товары для ТО'];
//
//        $autos = ['Audi', 'BMW', 'Bugatti', 'Cadilac', 'Ferrari', 'Ford', 'Jeep', 'Lamborghini ', 'Lexus', 'Mercedes', 'Opel', 'Porsche', 'Volvo', 'LADA', 'GAZ'];
/*
        foreach ($levels as $k => $v){
            foreach ($autos as $kk => $vv){
                DB::table('products')->insert([
                    'name' => $v .' для ' . $vv . ' ' . $k . $kk,
                    'vendor_code' => \rand(10000, 20000),
                    'qty' => \rand(0, 500),
                    'price' => \rand(100, 10000),
                    'universality' => 0,
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel purus nibh. Nunc et accumsan eros. Aliquam erat volutpat. Donec sed faucibus sem.',
                ]);

                DB::table('products')->insert([
                    'name' => $v .' для ' . $vv . ' ' . $kk . $k,
                    'vendor_code' => \rand(10000, 20000),
                    'qty' => \rand(0, 500),
                    'price' => \rand(100, 10000),
                    'universality' => 0,
                    'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel purus nibh. Nunc et accumsan eros. Aliquam erat volutpat. Donec sed faucibus sem.',

                ]);
            }
        }
*/
//        for ($i=0; $i<50; $i++){
//            DB::table('products')->insert([
//                'name' => 'Универсальный товар ' . $i,
//                'vendor_code' => \rand(10000, 20000),
//                'qty' => \rand(0, 500),
//                'price' => \rand(100, 10000),
//                'universality' => 1,
//                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel purus nibh. Nunc et accumsan eros. Aliquam erat volutpat. Donec sed faucibus sem.',
//            ]);
//        }

        DB::table('products')->insert([
            'name' => 'Диск тормозной задний NISSAN JUKE, QASHQAI, TEANA I-II (292мм) DF7369',
            'provider' => 'АВТОРУСЬ ЛОГИСТИКА',
            'vendor_code' => 'DF7369',
            'brand' => 'TRW',
            'qty' => 10000,
            'price' => 1000,
            'adaptability' => null,
            'level1' => 'ЗАПЧАСТИ',
            'level2' => 'Тормозные диски и колодки',
            'level3' => 'Тормозные диски',
        ]);

        DB::table('products')->insert([
            'name' => 'Масло моторное BMW M Twinpower Turbo Oil Longlife-01 SAE 0W-40 1л',
            'provider' => 'АВТОРУСЬ ЛОГИСТИКА бывший Восход-К Авто',
            'vendor_code' => '83212365925',
            'brand' => 'BMW',
            'qty' => 10000,
            'price' => 500,
            'adaptability' => null,
            'level1' => 'МАСЛА И ТЕХЖИДКОСТИ',
            'level2' => 'Масла моторные для автомобилей',
            'level3' => 'Оригинальные масла',
        ]);

        DB::table('products')->insert([
            'name' => 'Hyundai Solaris (2010-) салон (3D с подпятником)',
            'provider' => 'Элерон полиформ ООО',
            'vendor_code' => 'EL-60653',
            'brand' => 'Aileron',
            'qty' => 10000,
            'price' => 9000,
            'adaptability' => null,
            'level1' => 'АКСЕССУАРЫ',
            'level2' => 'Автомобильные ковры',
            'level3' => 'Ковры салонные и в багажник',
        ]);
    }
}
