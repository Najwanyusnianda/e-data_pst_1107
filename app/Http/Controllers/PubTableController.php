<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\PubTable;
use App\PubTableFiles;
use App\Publikasi;
use App\SubjectTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class PubTableController extends Controller
{
    //

##################################### get######################
    public function pubTableForm($pub_id){
        $pubTable=[];
        $daftar_subject=SubjectTable::all();
        $publikasi_detail=Publikasi::where('pub_id',$pub_id)->first();
        return view('publikasi.pub_table._addTableForm')
        ->with('daftar_subject',$daftar_subject)
        ->with('pub_detail',$publikasi_detail)
        ->with('pubTable',$pubTable);

    }

    public function pubTableFormUpdate(Request $request,$pub_id,$pubtable_id){

        $daftar_subject=SubjectTable::all();
        
        $publikasi_detail=Publikasi::where('pub_id',$pub_id)->first();
        $pubTable=PubTable::find($pubtable_id);
        $pubTableFiles=PubTableFiles::where('pub_table_id',$pubTable->id)->get();
        //dd($pubtable_id);
        return view('publikasi.pub_table._addTableForm')
        ->with('daftar_subject',$daftar_subject)
        ->with('pub_detail',$publikasi_detail)
        ->with('pubTable',$pubTable)
        ->with('pubTableFile',$pubTableFiles);

    }

#------------------------------------ Post ------------------------#
    public function create(Request $request,$pub_id){
 
       // $pdfFile=$request->file('PdfFileTable')->store('temp','public');
        //$nama_file=time()."_".$pdfFile->getClientOriginalName();
        //$folder_name=$pub_id;
        //$pdfFile->move($pub_id,$nama_file);

        $pubTable= PubTable::create([
            'type'=>"publikasi",
            'type_id'=>$pub_id,
            'title'=>$request->tableTitle,
            'hal_pdf_first'=>$request->hal_pdf_first,
            'hal_pdf_last'=>$request->hal_pdf_last,
            'bab_num'=>$request->babNumberForm,
            'subject_id'=>$request->subject_id
            //'pdf'=>$pdfFile
        ]);

       
       /* $this->validate($request, [

            'PdfFileTable' => 'required',
            'PdfFileTable.*' => 'mimes:pdf'
        ]);*/

        if($request->hasfile('PdfFileTable'))

        {

            if($pubTable->type=="publikasi"){
                $file=$request->file('PdfFileTable');

                $name =$pubTable->hal_pdf_first.'_'.$pubTable->title.'.'.$file->extension();
    
                //$file->move(public_path().'/files/'.$pubTable->pub_id, $name);  
                $path=$file->storeAs('file'.'/'.$pubTable->type_id.'/'.'pdf',$name,'public');
                //$files[] = $name;  
    
                PubTableFiles::create([
                    'pub_table_id'=>$pubTable->id,
                    'filename'=>$name,
                    //'filepath'=>'files/'.$pubTable->pub_id.'/'.$name,
                    'filepath'=>$path,
                    'type'=>'pdf'
                ]);
    
    
                //multiple file
               /*foreach($request->file('PdfFileTable') as $key=>$file)
    
               {
                //echo($key);
                $num=(int)$key;
                $num=$num+1;
               
                   $name =$pubTable->title.$num.'.'.$file->extension();
    
                   $file->move(public_path().'/files/'.$pubTable->pub_id, $name);  
    
                   $files[] = $name;  
    
               }
    
               foreach($files as  $key=>$file){
    
                   PubTableFiles::create([
                    'pub_table_id'=>$pubTable->id,
                    'filename'=>$file,
                    'filepath'=>'files/'.$pubTable->pub_id.'/'.$file,
                    'type'=>'pdf'
                   ]);
               }*/

               return redirect()->back();
            }
            
            elseif ($pubTable->type=="lainnya") {
                # code...
            }
            //one file
           

        }


       

    }



    public function update(Request $request,$pub_id,$table_id){
       
        $pubTable=PubTable::find($table_id);

        $tableFiles=PubTableFiles::where('pub_table_id',$pubTable->id)
        ->where('type','pdf')
        ->first();

        
        $pubTable->update(
            [
                'title'=>$request->tableTitle,
                'hal_pdf_first'=>$request->hal_pdf_first,
                'hal_pdf_last'=>$request->hal_pdf_last,
                'bab_num'=>$request->babNumberForm,
                'subject_id'=>$request->subject_id
            ]
        );

            if($request->hasfile('PdfFileTable'))
            {
                if($pubTable->type=='publikasi'){

                    $file=$request->file('PdfFileTable');
                
                    $name =$pubTable->hal_pdf_first.'_'.$pubTable->title.'.'.$file->extension();
                   
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
                    //delete file lama
                 

                    //update file baru
                    // $file->move(public_path().'/files/'.$pubTable->pub_id, $name);  
                     $path=$file->storeAs('file'.'/'.$pubTable->type_id.'/'.'pdf',$name,'public');
    
                     $pubTableFiles=PubTableFiles::where('pub_table_id',$pubTable->id)->delete();
    
                     PubTableFiles::create([
                        'pub_table_id'=>$pubTable->id,
                        'filename'=>$name,
                        'filepath'=>$path,
                        'type'=>'pdf'
                       ]);
                 
                  /* foreach($request->file('PdfFileTable') as $key=>$file)
        
                   {
                    //echo($key);
                    $num=(int)$key;
                    $num=$num+1;
                   
                       $name =$pubTable->title.'.'.$file->extension();
    
                       if(File::exists(public_path('/files/'.$pubTable->pub_id.'/'.$name)))
                       {
                        File::delete(public_path('/files/'.$pubTable->pub_id.'/'.$name));
                        }
    
                        $file->move(public_path().'/files/'.$pubTable->pub_id, $name);  
        
                        $files[] = $name; 
                      
                   }
    
    
                   $pubTableFiles=PubTableFiles::where('pub_table_id',$pubTable->id)->delete();
                   foreach($files as  $key=>$file){
        
                       PubTableFiles::create([
                        'pub_table_id'=>$pubTable->id,
                        'filename'=>$file,
                        'filepath'=>'files/'.$pubTable->pub_id.'/'.$file,
                        'type'=>'pdf'
                       ]);
                   }*/
                }
               
            }

            return redirect()->back();
    }


    public function changeBabPubTableEvent(Request $request,$pub_id){
      
        if($request->has('bab_val') ){
            $bab_num=$request->bab_val;
            return view('publikasi.pub_table._bab_list_table',compact('pub_id','bab_num'));
        }
        elseif($request->has('n_bab_value')){
            $bab_num=$request->n_bab_value;
            return view('publikasi.pub_table._bab_list_table',compact('pub_id','bab_num'));
        }
        else{
            $bab_num=1;
            return view('publikasi.pub_table._bab_list_table',compact('pub_id','bab_num'));
        }
        

    }



#---------------------------- Services ----------------------------#

    public function tableDatabyBab($pub_id,$bab_num){
 
        if(!empty($bab_num)){
            $publikasi_table=PubTable::where('pub_tables.type','publikasi')
            ->where('pub_tables.type_id',$pub_id)
            ->where('pub_tables.bab_num',$bab_num)
            ->leftJoin('pub_table_files','pub_table_files.pub_table_id','=','pub_tables.id')
            ->select('pub_tables.*','pub_tables.type AS types','pub_table_files.*','pub_tables.id AS id','pub_table_files.id AS file_id')
            ->get();

//dd($publikasi_table);
            $dt=DataTables::of($publikasi_table)
            ->addColumn('action',function($publikasi_table){
                $id=$publikasi_table->id;
                $delete_url="#";
                
               $update_button= '<a href="" class="edit_table_form text-decoration-none text-warning" data-id="'.$id.'"><i class="far fa-edit"></i></a>';
               $delete_button= '<a href="'.$delete_url.'" class="text-decoration-none text-danger"><i class="fas fa-trash-alt"></i></a>';
               return($update_button.$delete_button);
            })
            ->addColumn('judul_new',function($publikasi_table){
                if($publikasi_table->filepath != null){
                    $source=asset('storage/'.$publikasi_table->filepath);
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

        }else{
            dd($bab_num);
            $publikasi_table=PubTable::where('pub_tables.type','publikasi')
            ->where('pub_tables.type_id',$pub_id)
            ->where('pub_tables.bab_num',1)
            ->leftJoin('pub_table_files','pub_tables.id','=','pub_table_files.pub_table_id')
            ->select('pub_tables.*','pub_table_files.*','pub_tables.id AS id','pub_table_files.id AS file_id')
            ->get();


            $dt=DataTables::of($publikasi_table)
            ->addColumn('action',function($publikasi_table){
                $id=$publikasi_table->id;
                $delete_url="#";
               $update_button= '<a href="#" class="edit_table_form text-decoration-none text-warning" data-id="'.$id.'"><i class="far fa-edit"></i></a>';
               $delete_button= '<a href="'.$delete_url.'" class="text-decoration-none text-danger"><i class="fas fa-trash-alt"></i></a>';
                return($update_button.$delete_button);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);

            return($dt);
        }

    }

    public function readPubTables(){

    }

    public function downloadPubTables(){
        
    }
    
}
