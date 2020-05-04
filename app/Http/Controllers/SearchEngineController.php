<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTable;
use App\PubTable;
use App\SubjectTable;
use Yajra\DataTables\Facades\DataTables;

class SearchEngineController extends Controller
{
    //

    public function search_result_index(Request $request ){
    // menangkap data pencarian


    }

    public function post_search(Request $request){
    
        if($request->has('search')){
            $keyword = $request->search;

            // mengambil data dari table pegawai sesuai pencarian data
           $search_result = DB::table('pub_tables')
           ->where('title','like',"%".$keyword."%")
           ->get();
    
           if($search_result->isNotEmpty()){
            return view('search.search_result',compact('search_result','keyword'));
           }else{
               return redirect()->back();
           }

           
        }
    }
#### services
    public function searchTable($keyword){
        $search_result = DB::table('pub_tables')
        ->where('title','like',"%".$keyword."%")
        ->leftJoin('pub_table_files','pub_tables.id','=','pub_table_files.pub_table_id')
        ->select('pub_tables.*','pub_table_files.*',
        'pub_tables.id AS id','pub_tables.type AS type','pub_table_files.id AS file_id', 'pub_table_files.type AS filetype')
        ->get();

        $dt=DataTables::of($search_result)
        ->addIndexColumn()
        ->make(true);
        return $dt;

    }




    public function subject_detail($subject_id){
        $data=PubTable::where('pub_tables.subject_id',$subject_id)
        ->join('subject_tables','pub_tables.subject_id','=','subject_tables.subject_id')
        ->get();
        $subject=SubjectTable::find($subject_id);
        return view('search.search_subject',compact('data','subject'));
    }


    ################################### Subject #####
    public function DataBySubjectTable(){

    }
}
