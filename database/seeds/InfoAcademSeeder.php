<?php

use Illuminate\Database\Seeder;
use App\InfoAcadem;

class InfoAcademSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i <= 10 ; $i ++){
            factory(InfoAcadem::class)->times(1)->create([
                'id_alumno' => $i,
            ]);
        }

        for($i = 11 ; $i <= 20 ; $i ++){
            factory(InfoAcadem::class)->times(1)->create([
                'id_alumno' => $i,
                'situacion' => "R"
            ]);
        }
    }
}
