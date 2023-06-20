<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Painel extends Controller
{
    public function index(){
        return view('painel.home');
    }
}