<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     *
     * @return void
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        if ($data) {
            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);
            Auth::login($user);
        }

        return to_route('series.index');
    }
}
