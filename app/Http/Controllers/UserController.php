<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
    {
        $users = User::paginate(10);
        return view('usuarios.show', ['users' => $users]);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'cpf' => 'required|max:11|min:11|unique:users',
            'office' => 'required'
        ]);
    }

    public function create()
    {
                return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        $new_password = $request->password;
        $user         = User::findOrFail($user->id);

        $user->fill([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        if (!empty($new_password)) {
            $user->password = bcrypt($new_password);
        }

        $user->save();

        return redirect(route('user.index'));
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit', ['usuario' => $usuario]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('user.index'));
    }


    public function update(Request $request)
    {
        //dd($request->id);
        $new_password = $request->password;
        $user         = User::findOrFail($request->id);

        $user->fill([
            'office'  => $request->office,
        ]);

        if (!empty($new_password)) {
            $user->password = bcrypt($new_password);
        }

        $user->save();
        return redirect(route('user.index'));
    }

}
