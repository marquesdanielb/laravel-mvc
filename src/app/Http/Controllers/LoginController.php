<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     *
     * @return void
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos']);
        };

        return to_route('series.index');
    }

    /**
     *
     * @return void
     */
    public function destroy()
    {
        Auth::logout();

        return to_route('login');
    }
}
