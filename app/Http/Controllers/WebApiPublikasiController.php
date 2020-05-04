<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Publikasi;
//use GuzzleHttp\Client;




class WebApiPublikasiController extends Controller
{
    //
    public function publicationListApi(Request $request){
        $publikasi_added=Publikasi::select('pub_id')->get();
        $pub_id_array=[];
        $year='2020';
        $years_select=['2020','2019','2018'];

        //dd(!$publikasi_added->isEmpty());


        if(!$publikasi_added->isEmpty()){
            
            foreach($publikasi_added as $pub){
                $pub_id_array[]=$pub->pub_id;
            }
            $pub_id_array=json_encode($pub_id_array);
            if($request->has('year')){
       
                $year=$request->year;
            
                return view('publikasi.webapi.webapi_publikasi')
                ->with('pub_ids',$pub_id_array)
                ->with('year',$year)
                ->with('year_select',$years_select);
            }
            return view('publikasi.webapi.webapi_publikasi')
            ->with('pub_ids',$pub_id_array)
            ->with('year',$year)
            ->with('year_select',$years_select);
        }else{
            if($request->has('year')){
       
                $year=$request->year;
            
                return view('publikasi.webapi.webapi_publikasi')
                //->with('pub_ids',$pub_id_array)
                ->with('year',$year)
                ->with('year_select',$years_select);
            }
            return view('publikasi.webapi.webapi_publikasi')
            //->with('pub_ids',$pub_id_array)
            ->with('year',$year)
            ->with('year_select',$years_select);
        }
  

    }

    public function select_pub_from_api(Request $request){
        $pub_id=$request->pub_id;
        $api_key='9728004fed484ca5b90eb484730032ea';
        $api_url='https://webapi.bps.go.id/v1/view/1107/publication/'.$pub_id.'/'.$api_key;

    }
}
