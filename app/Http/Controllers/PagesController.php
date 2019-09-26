<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {
    public function home () {
        $titulo = 'U2SOFTWARE TEST';
        return view('index', [
            'title' => $titulo
        ]);
    }
}