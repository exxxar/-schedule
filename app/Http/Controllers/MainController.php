<?php

namespace App\Http\Controllers;

use App\Bell;
use App\Fack;
use App\Rasp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    //

    public function index(){
        return view("index");
    }

    public function index2(){
        return view("index2");
    }

    public function table(){
        return view("table");
    }

    public function table2(){
        return view("table2");
    }

   public function systemDate()
   {
       $mytime = Carbon::now();
       return $mytime->format("d.m.Y");
   }

    public function week()
    {
        $mytime = Carbon::now();
        return ($mytime->format("W") % 2 != 0? "Верхняя":"Нижняя")." неделя" ;
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

    public function raspPost(Request $request){
        //return Rasp::all()

        $rasp = DB::table('rasp')->where([
            ['id_Fack', '=', $request->get('id_Fack')],
            ['id_Group', '=', $request->get('id_Group')],
            ['Course', '=', $request->get('Course')]
        ])->get();

        return $rasp;
    }

    public function subject($id){
        //return Rasp::all()

        $rasp = DB::table('rasp')->where([
            ['id', '=', $id]

        ])->get();

        return $rasp;
    }

    public function fackList(){
        return Fack::All();
    }

    public function bellList(){
        return Bell::All();
    }


    public function groupsInFack(Request $request) {
        $groups = DB::table('group')->where([
            ['id_Fack', '=', $request->get("fackId")],
            ['Course', '=', $request->get("courseId")]
        ])->get();

        return $groups;
    }

    public function searchFilter(Request $request){
        $day = $request->get("day");//1..7
        $week = $request->get("week");//0 - верхняя, 1 - нижняя, 2 - обе
        $fack = $request->get("fack_id");//1..12
        $course = $request->get("course_num");//0..6
        $group = $request->get("group_id"); //0...N
        $sorted = !empty($request->get("sorted"))?$request->get("sorted"):'asc';//[asc,desc]


        $rasp = DB::table('rasp')
            ->join('fack', 'rasp.id_Fack', '=', 'fack.Number')
            ->join('group', 'rasp.id_Group', '=', 'group.id')
            ->where([
            ['rasp.id_Fack', '=', $fack],
            ['rasp.Course', '=', $course],
            ['rasp.id_Group', '=', $group],
            ['rasp.Day', '=', $day],
            ['rasp.Week', '=', $week]
        ])->orderBy('rasp.Number_pr', $sorted )
            ->get();

        if (empty($rasp)||$rasp="[]")
            $rasp = Rasp::All();
        return $rasp;
    }
}
