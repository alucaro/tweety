<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        //abort_if ($user->isNot(current_user()), 404);
        //whit policy file
        //$this->authorize('edit, $user');
        //move this to route middleware 
        return view('profiles.edit', compact('user'));
    }

}
