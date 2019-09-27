<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller {
    public function home () {
        $titulo = 'U2SOFTWARE TEST';
        $user = Auth::user();
        return view('index', [
            'title' => $titulo,
            'user' => $user
        ]);
    }
    /*public function data () {
        $user = Auth::user();
        return view('hobbies', [
            'user' => $user
        ]);
    }*/
}