<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;


class BlogController extends Controller
{

    public function InfoView()
    {   
        Mapper::map(45.64795865868576, 25.60045524133755);
        return view('frontend.blog');
    }

  

    // public function InfoStore(Request $request){

        
    //     $request->validate([
    //         'descp_en' => 'required',
    //         'descp_ger' => 'required',
        
    //     ], [
    //         'descp_en' => 'Input Description in English',
    //         'descp_ger' => 'Input Description in German',
    //     ]);



    //     Blog::insert([
    //         'descp_en' => $request->descp_en,
    //         'descp_ger' => $request->descp_en,
           
    //     ]);


    //     return redirect()->route('blog');

    // }
    
}
