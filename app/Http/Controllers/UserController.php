<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $registro = User::all();
        return view('users', [
            'data' => $registro
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
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
        /*$value = $request->session()->get('key');
        dd($value);*/
        return 'show';
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
        /*$validatedData = $request->validate([
            'inputA' => 'required|unique:posts|max:255',
            'inputB' => 'required',
            'inputC' => 'required',
            'inputE' => 'required',
            'inputF' => 'required',
            'inputG' => 'required',
        ]);*/
        $registro = User::find($id);
        $registro->email = $request->get('inputA');;
        $registro->name = $request->get('inputB');
        $registro->password = Hash::make($request->get('inputC'));
        $registro->nickname = $request->get('inputE');
        $registro->city = $request->get('inputF');
        $registro->perfil = $request->get('inputG');
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