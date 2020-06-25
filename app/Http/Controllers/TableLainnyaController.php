<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\OtherPub;
use App\PubTable;
use App\PubTableFiles;
use App\SubjectTable;
use Illuminate\Support\Facades\Storage;


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
        $daftar_subject=SubjectTable::all();
        return view('backend.lainnyaPub.create_form',compact('daftar_subject'));
    }

    public function update($lainnya_id){
        $daftar_subject=SubjectTable::all();
        $pubTable=PubTable::where('type','lainnya')->where('id',$lainnya_id)->first();

        return view('backend.lainnyaPub.create_form',compact('pubTable','daftar_subject'));
    }




    public function store(Request $request){
        $pubTable=PubTable::create([
            'type'=>'lainnya',
            'type_id'=>$request->subject_id,
            'title'=>$request->tableTitle,
            'subject_id'=>$request->subject_id
        ]);

        if($request->hasfile('PdfFileTable')){
            $file=$request->file('PdfFileTable');
            $name=$pubTable->title.'.'.$file->extension();
            $path=$file->storeAs('file'.'/lainnya/'.$pubTable->type_id.'/'.'pdf',$name,'public');

            PubTableFiles::create([
                    'pub_table_id'=>$pubTable->id,
                    'filename'=>$name,
                    //'filepath'=>'files/'.$pubTable->pub_id.'/'.$name,
                    'filepath'=>$path,
                    'type'=>'pdf'
                ]);

                $pubTable->update([
                    'pdf'=>$path
                ]);
        }
        
        return redirect()->back();

    }

    public function storeUpdate(Request $request,$lainnya_id){
        $pubTable=PubTable::find($lainnya_id);
        $tableFiles=PubTableFiles::where('pub_table_id',$pubTable->id)
        ->where('type','pdf')
        ->first();

        $pubTable->update([
            'type'=>'lainnya',
            'type_id'=>$lainnya_id,
            'title'=>$request->tableTitle,
            'subject_id'=>$request->subject_id
        ]);

        if($request->hasfile('PdfFileTable'))
        {
            $file=$request->file('PdfFileTable');
            $name=$pubTable->title.'.'.$file->extension();
            $path=$file->storeAs('file'.'/'.$pubTable->type_id.'/'.'pdf',$name,'public');

            if(!empty($tableFiles)){
                        $isExists = Storage::exists('app/public/'.$tableFiles->filepath);
                        /*if(File::exists(public_path('/'.$tableFiles->filepath)))
                        {
                         File::delete(public_path('/'.$tableFiles->filepath));
                        }*/
                        if($isExists){
                            Storage::delete('app/public/'.$tableFiles->filepath);
                        }
        
            }

                PubTableFiles::create([
                    'pub_table_id'=>$pubTable->id,
                    'filename'=>$name,
                    //'filepath'=>'files/'.$pubTable->pub_id.'/'.$name,
                    'filepath'=>$path,
                    'type'=>'pdf'
                ]);

                $pubTable->update([
                    'pdf'=>$path
                ]);    
                
                return redirect()->back();
        }



        return redirect()->back();
    }

    public function delete($lainnya_id){
        $otherPub=PubTable::find($lainnya_id);
        $otherPub->delete();

        $tableFiles=PubTableFiles::where('pub_table_id',$lainnya_id)
        ->where('type','pdf')
        ->first();
        if(!empty($tableFiles)){
                        $isExists = Storage::exists('app/public/'.$tableFiles->filepath);
                        /*if(File::exists(public_path('/'.$tableFiles->filepath)))
                        {
                         File::delete(public_path('/'.$tableFiles->filepath));
                        }*/
                        if($isExists){
                            Storage::delete('app/public/'.$tableFiles->filepath);
                        }
        
        }
    }
    ////pubtable lainnya
    public function createTableLainnya(){
        $daftar_subject=SubjectTable::all();

        return view('backend.lainnyaPub.pubTable.create_table_form');
    }

    public function updateTableLainnya(){
        return view('backend.lainnyaPub.update_table_form');
    }

    public function storeTable(Request $request){
        $pubTable=PubTable::create([
            'type'=>'lainnya',
            'type_id'=>$request->subject_id,
            'title'=>$request->title,
            'subject_id'=>$request->subject_id
        ]);

        if($request->hasfile('PdfFileTable')){
            $file=$request->file('PdfFileTable');
            $name=$pubTable->title.'.'.$file->extension();
            $path=$file->storeAs('file'.'/lainnya/'.$pubTable->type_id.'/'.'pdf',$name,'public');

            PubTableFiles::create([
                    'pub_table_id'=>$pubTable->id,
                    'filename'=>$name,
                    //'filepath'=>'files/'.$pubTable->pub_id.'/'.$name,
                    'filepath'=>$path,
                    'type'=>'pdf'
                ]);

                $pubTable->update([
                    'pdf'=>$path
                ]);
        }
    }

    public function storeUpdateTable(Request $request,$pub_id,$table_id){
        $pubTable=PubTable::find($table_id);
        $tableFiles=PubTableFiles::where('pub_table_id',$pubTable->id)
        ->where('type','pdf')
        ->first();

        $pubTable->update([
            'type'=>'lainnya',
            'type_id'=>$lainnya_id,
            'title'=>$request->title,
            'subject_id'=>$request->subject_id
        ]);

        if($request->hasfile('PdfFileTable'))
        {
            $file=$request->file('PdfFileTable');
            $name=$pubTable->title.'.'.$file->extension();
            $path=$file->storeAs('file'.'/'.$pubTable->type_id.'/'.'pdf',$name,'public');

            if(!empty($tableFiles)){
                        $isExists = Storage::exists('app/public/'.$tableFiles->filepath);
                        /*if(File::exists(public_path('/'.$tableFiles->filepath)))
                        {
                         File::delete(public_path('/'.$tableFiles->filepath));
                        }*/
                        if($isExists){
                            Storage::delete('app/public/'.$tableFiles->filepath);
                        }
        
            }

                PubTableFiles::create([
                    'pub_table_id'=>$pubTable->id,
                    'filename'=>$name,
                    //'filepath'=>'files/'.$pubTable->pub_id.'/'.$name,
                    'filepath'=>$path,
                    'type'=>'pdf'
                ]);

                $pubTable->update([
                    'pdf'=>$path
                ]);    
                
                return redirect()->back();
        }
        
    }

    public function deleteTableLainnya($lainnya_table_id){

    }

    


        //lainnya table services
    public function lainnyaTable(){
        $publikasi_table=PubTable::where('type','lainnya')->get();
        $dt=DataTables::of($publikasi_table)
                ->addColumn('action',function($publikasi_table){
                    $id=$publikasi_table->id;
                    $delete_url="#";
                    
                   $update_button= '<a href="'.route('admin.lainnya.update',[$id]).'" class="edit_table_form text-decoration-none text-warning" data-id="'.$id.'"><i class="far fa-edit"></i></a>';
                   $delete_button= '<a href="'.route('admin.lainnya.delete',[$id]).'" class="deleteLainnya text-decoration-none text-danger"><i class="fas fa-trash-alt"></i></a>';
                   return($update_button.$delete_button);
                })
                ->addColumn('judul_new',function($publikasi_table){
                    if($publikasi_table->pdf != null){
                        $source=asset('storage/'.$publikasi_table->pdf);
                       $link= '<a href="'.$source.'" class="" target="_blank" > '. $publikasi_table->title.'</a>';
                       return $link;
                    }else{
                       $link= $publikasi_table->title;
                       return $link;
                    }
                })
                ->addIndexColumn()
                ->rawColumns(['action','judul_new'])
                ->make(true);
 
     
        return($dt);
    }

    public function pubTableLainnyaTable($lainnya_id){

    }
}
