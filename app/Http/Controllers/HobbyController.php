<?php

namespace App\Http\Controllers;

use App\User;
use App\Hobby;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HobbyController extends Controller {
    /**
     * Metodo constructor
     * Implementacion de middleware de autenticacion
     */
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();
        $registros = User::find($user->email)->hobbies;
        return view('hobbies', [
            'data' => $registros,
            'user' => $user
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return redirect('hobbies');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'hobby'     => 'required|min:5|max:255',
        ]);
        $user = Auth::user();
        $report = new Hobby();
        $report->fk_users = $user->email;
        $report->hobby = $request->get('hobby');
        $report->save();
        return redirect('hobbies');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('hobbies');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}