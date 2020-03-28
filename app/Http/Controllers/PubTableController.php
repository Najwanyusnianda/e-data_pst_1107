<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PubTable;

class PubTableController extends Controller
{
    //

    public function create(Request $request,$pub_id){
 
        $pdfFile=$request->file('PdfFileTable')->store('temp','public');
        //$nama_file=time()."_".$pdfFile->getClientOriginalName();
        //$folder_name=$pub_id;
        //$pdfFile->move($pub_id,$nama_file);
        $pubTable= PubTable::create([
            'pub_id'=>$pub_id,
            'title'=>$request->tableTitle,
            'hal_pdf_first'=>$request->hal_pdf_first,
            'hal_pdf_last'=>$request->hal_pdf_last,
            'bab_num'=>$request->babNumberForm,
            'pdf'=>$pdfFile
        ]);

    }
    
}
