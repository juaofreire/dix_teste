<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    //New Functions


    //Retorna página 'adicionar novo usuário'
    public function add(User $model)
    {
        return view('users.add');
    }
    
    //Cria um novo usuário no banco
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), 
        ]);
        
        return redirect('/user')->with('success', 'User created successfully');
    }
    
    //Retorna página 'editar usuário'
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    //Atualiza os dados do usuário no banco
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        $user->save();

        return redirect('/user')->with('success', 'User updated successfully');
    }

    //Atualiza a senha do usuário no banco
    public function password(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->password = $request->input('password');

        $user->save();

        return redirect('/user')->with('success', 'Password changed successfully');
    }

    //Deleta o usuário do banco
    public function delete(Request $request, $id)
    {
        User::findOrFail($id);

        User::destroy($id);

        return redirect('/user')->with('success', 'User deleted successfully');
    }

}
