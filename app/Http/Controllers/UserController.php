<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller {
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
        $registro = User::all();
        switch ($user->perfil) {
            case 'Administrador': {
                return view('users', [
                    'data' => $registro,
                    'user' => $user
                ]);
            }
            default: {
                return redirect('hobbies');
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return redirect('users');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('users');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        return view('modify', [
            'usuario' => $user
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name'     => 'required|min:5|max:255',
            'password' => 'required|min:8|max:255',
            'nickname' => 'required|min:5|max:100',
            'city'     => 'required|min:3|max:255',
            'perfil'   => 'required',
        ]);
        /*if ($request->get('password') == $request->get('passwordr')){
            dd('exito');
        }
        else {
            dd('Fallo');
        }*/
        $registro = User::find($id);
        $registro->name = $request->get('name');
        $registro->password = Hash::make($request->get('password'));
        $registro->nickname = $request->get('nickname');
        $registro->city = $request->get('city');
        $registro->perfil = $request->get('perfil');
        $registro->save();
        return redirect('users');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $registro = User::find($id);
        $registro->delete();
        return redirect('users');
    }
}