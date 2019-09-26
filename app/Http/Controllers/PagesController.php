<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {
    public function home () {
        $name = 'Andres Carranza Rivera';
        return view('welcome', [
            'Name' => $name
        ]);
    }
}