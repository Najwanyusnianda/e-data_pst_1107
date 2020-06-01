<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publikasi;

class PubSearchController extends Controller
{
    //

    public function indexApi(Request $request)
    {
        $publikasi_added=Publikasi::select('pub_id')->get();
        $pub_id_array=[];
        $year='2020';
        $years_select=['2020','2019','2018','2017','2016','2015','2014','2013'];

        //dd(!$publikasi_added->isEmpty());


        if(!$publikasi_added->isEmpty()){
            
            foreach($publikasi_added as $pub){
                $pub_id_array[]=$pub->pub_id;
            }
            $pub_id_array=json_encode($pub_id_array);
            if($request->has('year')){
       
                $year=$request->year;
            
                return view('search.search_publikasi.search_publikasi')
                ->with('pub_ids',$pub_id_array)
                ->with('year',$year)
                ->with('year_select',$years_select);
            }
            return view('search.search_publikasi.search_publikasi')
            ->with('pub_ids',$pub_id_array)
            ->with('year',$year)
            ->with('year_select',$years_select);
        }else{
            if($request->has('year')){
       
                $year=$request->year;
            
                return view('search.search_publikasi.search_publikasi')
                //->with('pub_ids',$pub_id_array)
                ->with('year',$year)
                ->with('year_select',$years_select);
            }
            return view('search.search_publikasi.search_publikasi')
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
