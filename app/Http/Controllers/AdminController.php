<?php

namespace App\Http\Controllers;

use App\Bell;
use App\Fack;
use App\Rasp;
use App\Group;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $fucks = Fack::all();
        $groups = Group::all();
        $bells = Bell::all();
        $rasps = Rasp::all();
        return view("admin.index", ["fucks"=>$fucks,"groups"=>$groups,"bells"=>$bells, "rasps"=>$rasps]);
    }

    public function facultModify(Request $request){

        $fuclt = !empty($request->get("fack_id"))? Fack::find($request->get("fack_id")):new Fack();

        $fuclt->Number = $request->get("fack_number");
        $fuclt->Name = $request->get("fack_name");
        $fuclt->Kurs = "12345";//$request->get();

        $fuclt->save();
        return redirect("admin/");
    }

    public function facultDel($id){
        $flight = Fack::find($id);
        $flight->delete();
        return redirect("admin/");
    }

    public function groupDel($id){
        $flight = Group::find($id);
        $flight->delete();
        return redirect("admin/");
    }

    public function bellDel($id){
        $flight = Bell::find($id);
        $flight->delete();
        return redirect("admin/");
    }

    public function raspDel($id){
        $flight = Rasp::find($id);
        $flight->delete();
        return redirect("admin/");
    }

    public function groupModify(Request $request){

        $groups = !empty($request->get("group_id"))? Group::find($request->get("group_id")):new Group();

        $groups->id_Fack = $request->get("id_Fack");
        $groups->Name_group = $request->get("group_name");
        $groups->Course= $request->get("group_course");

        $groups->save();
        return redirect("admin/");
    }



    public function bellModify(Request $request){

        $bells = !empty($request->get("bell_id"))? Bell::find($request->get("bell_id")):new Bell();

        $bells->Time = $request->get("bell_time");
        $bells->Number_pr = $request->get("bell_numberpr");

        $bells->save();
        return redirect("admin/");

    }

    public function raspModify(Request $request){

        $rasp = !empty($request->get("rasp_id"))? Rasp::find($request->get("rasp_id")):new Rasp();
            $rasp->id_Fack = $request->get("rasp_idfack");
        $rasp->id_Group = $request->get("rasp_idgroup");
        $rasp->Name_pr = $request->get("rasp_namepr");
        $rasp->Number_pr = $request->get("rasp_numberpr");
        $rasp->Name_lector = $request->get("rasp_namelector");
        $rasp->Number_aud = $request->get("rasp_numberaud");
        $rasp->Day = $request->get("rasp_day");
        $rasp->Week = $request->get("rasp_week");
        $rasp->Course = $request->get("rasp_course");

        $rasp->save();
        return redirect("admin/");
    }
}
