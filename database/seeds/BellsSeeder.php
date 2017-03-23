<?php

use App\Bell;
use Illuminate\Database\Seeder;

class BellsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bell::truncate();
        $bellsList = array(
            array('start'=>"08:00","end"=>"09:30"),
            array('start'=>"09:50","end"=>"11:20"),
            array('start'=>"11:30","end"=>"13:00"),
            array('start'=>"13:10","end"=>"14:40"),
            array('start'=>"14:45","end"=>"16:05"),
            array('start'=>"16:10","end"=>"17:40"),
            array('start'=>"17:45","end"=>"19:15")

        );
        for($i=0;$i<count($bellsList);$i++) {
            DB::table('bell')->insert([
                'Number_pr' =>$i,
                'Time_start' => $bellsList[$i]["start"],
                'Time_end' => $bellsList[$i]["end"],
                "created_at" => new \Carbon\Carbon(),
                "updated_at" => new \Carbon\Carbon()
            ]);
        }
    }
}
