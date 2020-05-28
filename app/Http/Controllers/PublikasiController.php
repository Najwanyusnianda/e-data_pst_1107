<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publikasi;
use App\PubTable;
use App\PubTableFiles;
use App\SubjectTable;

use Yajra\DataTables\Facades\DataTables as DataTables;

class PublikasiController extends Controller
{
    //ui ------------------------------------------------------------------------------>

    public function index(Request $request){
        if($request->has("data")){
            if($request->data == "success"){
                $request->session()->flash('pub_add_success', 'Publikasi berhasil ditambahkan');
                //Session::flash('message', "Publikasi Berhasil Ditambahkan");
                return redirect()->route('admin.publikasi_index');
            }
        }
        return view('publikasi.publikasi_list');
    }



    public function publicationTableDetail($id){
        $id_pub=$id;
        $pubTableGroup=[];
        $daftar_subject=SubjectTable::all();
        $publikasi_detail=Publikasi::where('pub_id',$id_pub)->first();

        $n_bab=(int)$publikasi_detail->n_bab;
        for ($i=0; $i <$n_bab ; $i++) { 
            # code...
            $pubTableGroup[$i]=PubTable::where('pub_tables.type','publikasi')
            ->where('bab_num',$i+1)
            ->where('pub_tables.type_id',$id_pub)
            ->leftJoin('pub_table_files','pub_tables.id','=','pub_table_files.pub_table_id')
            ->select('pub_tables.*','pub_table_files.*','pub_tables.id AS id','pub_table_files.id AS file_id')
            ->simplePaginate(5);
        }

        $publikasi_table=PubTable::where('pub_tables.type','publikasi')
        ->where('pub_tables.type_id',$id_pub)
        ->leftJoin('pub_table_files','pub_tables.id','=','pub_table_files.pub_table_id')
        ->select('pub_tables.*','pub_table_files.*','pub_tables.id AS id','pub_table_files.id AS file_id')
        ->get();
        //dd($publikasi_table);

       // $publikasi_table_files=PubTableFiles::where('type','pdf')->get();

        return view('publikasi.pub_table.publikasi_listTable')
        ->with('daftar_subject',$daftar_subject)
        ->with('pub_table',$publikasi_table)
        ->with('pub_detail',$publikasi_detail)
        ->with('id',$id);
    }

 //post ------------------------------------------------------------------------------>
    
            ////get FROM API______________________
    public function postPublikasi(Request $request){
        
        $collection=$request->pubCollection;
      
        /*for ($i=0; $i <count($collection) ; $i++) { 
            Publikasi::create([
                'pub_id'=>$collection[$i]['pub_id'],
                'title'=>$collection[$i]['title'],
                'issn'=>$collection[$i]['issn'] ?? null,
                'size'=>$collection[$i]['size'],
                'cover'=>$collection[$i]['cover'],
                'pdf'=>$collection[$i]['pdf'],
                'release_date'=>$collection[$i]['sch_date'] ?? \Carbon\Carbon::now(),
                'update_date'=>$collection[$i]['rl_date'],
               
            ]);
        }*/
        if($request->has('is_pub_detail')){

          
            Publikasi::create([
                'pub_id'=>$collection['pub_id'],
                'title'=>$collection['title'],
                'issn'=>$collection['issn'] ?? null,
                'size'=>$collection['size'],
                'cover'=>$collection['cover'],
                'pdf'=>$collection['pdf'],
                'release_date'=>$collection['rl_date'],
                'update_date'=>$collection['updt_date'] ,
                'abstract'=>$collection['abstract'],
                'kat_no'=>$collection['kat_no'],
                'pub_no'=>$collection['pub_no'] 
            ]);
            return response()->json(['url'=>url('/backend/publikasi')]);
        }

        
    }

    public function storeJumlahBab(Request $request,$id){
       // dd($request);
        $publikasi=Publikasi::where('pub_id',$id)->first();
        
        $publikasi->update([
            'n_bab'=>$request->n_bab_value
        ]);
        //dd($publikasi);
    }

    public function deletePublikasi(Request $request){
        $pub_id=$request->pub_id;

        $publikasi=Publikasi::find($pub_id)->delete();


    }


 //service ------------------------------------------------------------------------------>   
        //get daftar publikasi
    public function publicationListTable(){
        $publikasi =Publikasi::orderBy('release_date', 'desc')->get();
 
      
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
            $delete_link=route('admin.publikasi.delete');
            $detail_link=route('admin.pubTable.detail',[$publikasi->pub_id]);
            $pub_id=$publikasi->pub_id;
            $detail='<a href="'.$detail_link.'" class="btn btn-icon icon-left btn-info"><i class="fas fa-table"></i>Detail  </a>';
            $delete='<a href="'.$delete_link.'" class="btn btn-icon icon-left btn-danger ml-2 deletePub" data-id="'.$pub_id.'"><i class="fas fa-trash-alt"></i>Delete </a>';
            return($detail.$delete);
        })
        ->addIndexColumn()
        ->rawColumns(['cover_image','pdf_link','table_progress','action'])
        ->make(true);
     
        return($dt);
    }



}
