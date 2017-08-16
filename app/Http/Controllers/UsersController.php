<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($id)
    {
    	$user = \App\User::findOrFail($id);

    	return view('users.show', compact('user'));
    }
}
