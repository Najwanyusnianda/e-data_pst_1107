<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\PubTable;
use App\PubTableFiles;
use App\Publikasi;
use App\SubjectTable;

class PubTableController extends Controller
{
    //


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
    
                $file->move(public_path().'/files/'.$pubTable->pub_id, $name);  
    
                //$files[] = $name;  
    
                PubTableFiles::create([
                    'pub_table_id'=>$pubTable->id,
                    'filename'=>$name,
                    'filepath'=>'files/'.$pubTable->pub_id.'/'.$name,
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
                        if(File::exists(public_path('/'.$tableFiles->filepath)))
                        {
                         File::delete(public_path('/'.$tableFiles->filepath));
                        }
        
                    }
                    //delete file lama


                    //update file baru
                     $file->move(public_path().'/files/'.$pubTable->pub_id, $name);  
                    
    
                     $pubTableFiles=PubTableFiles::where('pub_table_id',$pubTable->id)->delete();
    
                     PubTableFiles::create([
                        'pub_table_id'=>$pubTable->id,
                        'filename'=>$name,
                        'filepath'=>'files/'.$pubTable->pub_id.'/'.$name,
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

    public function readPubTables(){

    }

    public function downloadPubTables(){
        
    }
    
}
