<?php

use App\Group;
use App\Rasp;
use Illuminate\Database\Seeder;

class RaspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        Rasp::truncate();
        $groups = Group::All();
        $raspList = array(
           "Мат. анализ", "Английский язык", "История", "Философия", "ТПО","РПИС","ДИСО", "Культура речи", "Русская литература", "Дифф. уравнения"
        );

        foreach ($groups as $g){
            $index = 1;
            for ($i=1;$i<49;$i++){

                $index = $i%7==0?1:$index+1;


                DB::table('rasp')->insert([
                    'id_Fack' =>$g->id_Fack,
                    'id_Group' =>$g->id,
                    'Course'=>$g->Course,
                    'Name_pr'=>$raspList[$faker->numberBetween(0,count($raspList)-1)],
                    'Number_pr'=>$index,
                    'Name_lector'=>$faker->firstName." ".$faker->lastName,
                    'Number_aud'=>$faker->numberBetween(100,500),
                    'Day'=>$faker->numberBetween(1,7),
                    'Week'=>$faker->numberBetween(0,2)
                ]);
            }
        }


    }
}
