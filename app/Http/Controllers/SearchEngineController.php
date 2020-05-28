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
               $search_count=count($search_result);
            return view('search.search_result',compact('search_result','keyword','search_count'));
           }else{
            $search_count=0;
            return view('search.search_result',compact('search_result','keyword','search_count'));
           }

           
        }
    }
#### services
    public function searchTable($keyword){
        $search_result = DB::table('pub_tables')
        ->where('pub_tables.title','like',"%".$keyword."%")
        ->leftJoin('pub_table_files','pub_tables.id','=','pub_table_files.pub_table_id')
        ->leftJoin('publikasis','pub_tables.type_id','=','publikasis.pub_id')
        ->select('pub_tables.*','pub_table_files.*','publikasis.title AS pub_name',
        'pub_tables.id AS id','pub_tables.type AS type','pub_table_files.id AS file_id', 'pub_table_files.type AS filetype')
        ->get();
        $dt=DataTables::of($search_result)
        ->addIndexColumn()
        ->addColumn('action',function($search_result){
            if(!empty($search_result->filepath)){
                $pdf_link=url('/'.$search_result->filepath);
                $pdf='<a href="'.$pdf_link.'" class="btn btn-icon icon-left btn-info"><i class="fas fa-table"></i>lihat  </a>';
                return($pdf);
            }else{
                $pdf='<span class="badge badge-warning"><small>tidak tersedia</small>  </span>';
                return($pdf);
            }

        })
        ->addColumn('judul',function($search_result){
            if($search_result->type=='publikasi'){
                $title='<a href="#" class="search-result-text">'. $search_result->title.'</a>';
                $pub_name=$search_result->pub_name;
                $source='<p style="margin-top:0"><small class="text text-muted text-sm" >sumber:' .$pub_name.'</small></p>';

                return($title.$source);
            }  
        })
        ->rawColumns(['action','judul'])
        ->make(true);
        return $dt;

    }




    public function subject_detail($subject_id){
        $data=PubTable::where('pub_tables.subject_id',$subject_id)
        ->join('subject_tables','pub_tables.subject_id','=','subject_tables.subject_id')
        ->simplePaginate(10);
        //dd($data);
        $subject=SubjectTable::find($subject_id);
        return view('search.search_subject',compact('data','subject'));
    }


    ################################### Subject #####
    public function DataBySubjectTable(){

    }
}
