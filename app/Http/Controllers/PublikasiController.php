<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publikasi;
use App\PubTable;

use Yajra\DataTables\Facades\DataTables as DataTables;

class PublikasiController extends Controller
{
    //

    public function index(){
        return view('publikasi.publikasi_list');
    }


    public function postPublikasi(Request $request){
        
        $collection=$request->pubCollection;
      
        for ($i=0; $i <count($collection) ; $i++) { 
            Publikasi::create([
                'pub_id'=>$collection[$i]['pub_id'],
                'title'=>$collection[$i]['title'],
                'issn'=>$collection[$i]['issn'] ?? 'tidak ada',
                'size'=>$collection[$i]['size'],
                'cover'=>$collection[$i]['cover'],
                'pdf'=>$collection[$i]['pdf'],
                'release_date'=>$collection[$i]['sch_date'] ?? \Carbon\Carbon::now(),
                'update_date'=>$collection[$i]['rl_date'],
            ]);
        }
    }

    public function publicationListTable(){
        $publikasi =Publikasi::all();
 
      
        $dt=Datatables::of($publikasi)
        ->addColumn('cover_image',function($publikasi){
            $source=$publikasi->cover;
            $img='<div class="container"> <img src="'.$source.'" alt="none"  class="img-thumbnail border-dark" style="height:50px" ></div>';
            return($img);

        })
        ->addColumn('pdf_link',function($publikasi){
            $source=$publikasi->pdf;
            $raw_pdf='<a href="'.$source.'" class="btn btn-icon icon-left btn-danger"><i class="fas fa-file-pdf"></i> Pdf</a>';
            return($raw_pdf);
        })
        ->addColumn('table_progress',function($publikasi){
            $val_progress=0;
            $raw_progress=' '.$val_progress.'%<div class="progress mb-3">
            <div class="progress-bar" role="progressbar" aria-valuenow="'.$val_progress.'" aria-valuemin="'.$val_progress.'" aria-valuemax="100"></div>
            </div>';
            return($raw_progress);
        })
        ->addColumn('action',function($publikasi){
         
            $detail_link=route('admin.pubTable.detail',[$publikasi->pub_id]);
            $detail='<a href="'.$detail_link.'" class="btn btn-icon icon-left btn-info"><i class="fas fa-table"></i>Detail Tabel </a>';
            return($detail);
        })
        ->addIndexColumn()
        ->rawColumns(['cover_image','pdf_link','table_progress','action'])
        ->make(true);
     
        return($dt);
    }

//input tabel ui
    public function publicationTableDetail($id){
        $id_pub=$id;

        $publikasi_detail=Publikasi::where('pub_id',$id_pub)->first();
        $publikasi_table=PubTable::where('pub_id',$id_pub)->get();

        return view('publikasi.pub_table.publikasi_listTable')
        ->with('pub_table',$publikasi_table)
        ->with('pub_detail',$publikasi_detail)
        ->with('id',$id);
    }
}
