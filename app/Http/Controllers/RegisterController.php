<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {

        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|alpha',
            'username' => ['required', 'min:3', 'max:10', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required']

            // 'password' => ['required', password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()]
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        //buat alert bisa cara ini juga
        session()->flash('success', 'Registrasi berhasil. Silahkan login');
        //buat alert bisa cara ini juga

        return redirect('/login')->with('success', 'Registrasi berhasil. Silahkan login');
    }
}
