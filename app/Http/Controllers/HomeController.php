<?php

namespace App\Http\Controllers;

use App\PubTable;
use Illuminate\Http\Request;
use App\SubjectTable;

class HomeController extends Controller
{

    public function index()
    {
        $subject=SubjectTable::all();
        if($subject->isNotEmpty()){
            
            return view('home.home',compact('subject'));
        }else{
            return view('home.home');
        }
        
    }

    public function faqIndex(){
        return view('home.faq_index');
    }


 
}
