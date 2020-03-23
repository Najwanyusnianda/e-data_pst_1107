<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webApiController extends Controller
{
    //

    public function fectPublikasi(){
        $apiKey="9728004fed484ca5b90eb484730032ea";
        $domain="1107";
        $model="publication";
        $endpoint_publist= 'https://webapi.bps.go.id/v1/api/list/?model=publication&domain=1107&year=2019&key=9728004fed484ca5b90eb484730032ea';
        $endpoint_pubview='https://webapi.bps.go.id/v1/api/view/?model=publication&domain=1107&lang=ind&id=pub-13342312&key=9728004fed484ca5b90eb484730032ea';

    }
}
