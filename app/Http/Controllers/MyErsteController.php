<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyErsteController extends Controller
{
    //
    public function index(){
        return view('myerste.index');
    }
}
