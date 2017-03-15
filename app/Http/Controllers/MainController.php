<?php

namespace App\Http\Controllers;

use App\Rasp;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //

    public function index(){
        return view("index");
    }

   public function systemDate()
   {
       $mytime = Carbon::now();
       return $mytime->format("d.m.Y");
   }

    public function week()
    {
        $mytime = Carbon::now();
        return $mytime->format("W") % 2 != 0? "Верхняя":"Нижняя" ;
    }

    public function rasp($fuckId=1,$courseId=1,$groupId=1){
        //return Rasp::all()

            $rasp = DB::table('rasp')->where([
                ['id_Fack', '=', $fuckId],
                ['id_Group', '=', $groupId],
                ['Course', '=', $courseId]
            ])->get();

        return $rasp;
    }

    public function groupsInFack($fuckId,$courseId) {
        $groups = DB::table('group')->where([
            ['id_Fack', '=', $fuckId],
            ['Course', '=', $courseId]
        ])->get();

        return $groups;
    }
}
