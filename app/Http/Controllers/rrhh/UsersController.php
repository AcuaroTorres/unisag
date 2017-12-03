<?php

namespace App\Http\Controllers\rrhh;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name','Asc')->paginate(10);
        return view('rrhh/index')
            ->with('users', $users)
            ->with('ActiveMenu','rrhh.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rrhh/create')
            ->with('ActiveMenu','rrhh.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->All());
        $user->password = bcrypt($request->id);
        $user->save();

        $user->roles()->attach(Role::where('name','Usuario')->first());

        session()->flash('info', 'El usuario '.$user->name.' ha sido creado.');

        return redirect()->route('rrhh.users.index')
            ->with('ActiveMenu','rrhh.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('rrhh.edit')
            ->with('user',$user)
            ->with('ActiveMenu','rrhh.users.create')
            ->with('ActiveSubMenu','rrhh.users.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //$user = User::find($id);
        $user->fill($request->all());
        $user->save();

        session()->flash('success', 'El usuario '.$user->name.' ha sido actualizado.');
        
        return redirect()->route('rrhh.users.index')
            ->with('ActiveMenu','rrhh.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {        
        /* Primero Limpiamos todos los roles */
        $user->roles()->detach();

        $user->delete();

        session()->flash('success', 'El usuario '.$user->name.' ha sido eliminado');

        return redirect()->route('rrhh.users.index')
            ->with('ActiveMenu','rrhh.users.index');
    }

    public function changePassword(User $user) {
        return view('rrhh.password');
    }

    public function updatePassword(Request $request, User $user) {
        return view('rrhh.password');
    }

}