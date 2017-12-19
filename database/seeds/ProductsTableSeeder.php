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
        $levels = ['Автокосметика', 'Автохимия', 'Аксессуары', 'Масла', 'Тех. жидкости', 'Расходные материалы', 'Инструмент',  'Запасные части по марке автомобиля', 'Товары для ТО'];

        $autos = ['Audi', 'BMW', 'Bugatti', 'Cadilac', 'Ferrari', 'Ford', 'Jeep', 'Lamborghini ', 'Lexus', 'Mercedes', 'Opel', 'Porsche', 'Volvo', 'LADA', 'GAZ'];
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
        for ($i=0; $i<50; $i++){
            DB::table('products')->insert([
                'name' => 'Универсальный товар ' . $i,
                'vendor_code' => \rand(10000, 20000),
                'qty' => \rand(0, 500),
                'price' => \rand(100, 10000),
                'universality' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel purus nibh. Nunc et accumsan eros. Aliquam erat volutpat. Donec sed faucibus sem.',
            ]);
        }

    }
}
