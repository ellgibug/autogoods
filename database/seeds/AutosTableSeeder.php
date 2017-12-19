<?php

use Illuminate\Database\Seeder;

class AutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $names = ['Audi', 'BMW', 'Bugatti', 'Cadilac', 'Ferrari', 'Ford', 'Jeep', 'Lamborghini ', 'Lexus', 'Mercedes', 'Opel', 'Porsche', 'Volvo', 'LADA', 'GAZ'];

        foreach ($names as $name){
            DB::table('autos')->insert([
                'name' => $name,
            ]);
        }

    }

}
