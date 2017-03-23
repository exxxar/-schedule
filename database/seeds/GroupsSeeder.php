<?php

use App\Fack;
use App\Group;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();
        $facks = Fack::all();
        foreach ($facks as $f){

            for ($c=1;$c<=6;$c++) {
                for($i=1;$i<=8;$i++)
                    DB::table('group')->insert([
                        'id_Fack' =>$f->Number,
                        'Name_group' => $f->Name."-".$c."-".$i,
                        'Course'=>$c,
                        "created_at" => new \Carbon\Carbon(),
                        "updated_at" => new \Carbon\Carbon()
                    ]);
            }
        }

    }
}
