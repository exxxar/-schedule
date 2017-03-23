<?php

use App\Bell;
use App\Fack;
use Illuminate\Database\Seeder;

class FacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Fack::truncate();
        $facksList = ["ФизикоТехнический","Математический","Филологический","Исторический","Факультет иностранных языков","Химический","Биологический","Юридический","Экономический","УНИ \"Экономическая кбиернетика\""];
        for($i=0;$i<count($facksList);$i++) {
            DB::table('fack')->insert([
                'Number' =>$i+1,
                'Name' => $facksList[$i],
                "created_at" => new \Carbon\Carbon(),
                "updated_at" => new \Carbon\Carbon()
            ]);
        }

    }
}
