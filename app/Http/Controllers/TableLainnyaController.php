<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\OtherPub;


class TableLainnyaController extends Controller
{
    //

    public function index(){
        return view('backend.lainnyaPub.indeks_pub_lainnya');
    }
    public function detailLainnya($lainnya_id){
        $publainnya=OtherPub::find($lainnya_id);
        return view('backend.lainnyaPub.detail_pub_lainnya',compact('publainnya'));
    }

    public function create(){
        return view('backend.lainnyaPub.create_form');
    }

    public function update($lainnya_id){
        $publainnya=OtherPub::find($lainnya_id);
        return view('backend.lainnyaPub.update_form',compact('publainnya'));
    }




    public function store(Request $request){

    }

    public function storeUpdate(Request $request,$lainnya_id){

    }

    public function delete($lainnya_id){
        
    }
    ////pubtable lainnya
    public function createTableLainnya(){

    }

    public function updateTableLainnya(){

    }

    public function storeTable(Request $request){

    }

    public function storeUpdateTable(Request $request,$lainnya_table_id){

    }

    public function deleteTableLainnya($lainnya_table_id){

    }

    


        //lainnya table services
    public function lainnyaTable(){
        $pub=OtherPub::all();
        $dt=DataTables::of($pub)->make(true);
    }

    public function pubTableLainnyaTable($lainnya_id){

    }
}
