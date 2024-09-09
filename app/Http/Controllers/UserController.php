<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
{
    $currentUser = Auth::user();
    
    if ($currentUser->isSuperAdmin()) {

        $users = User::whereIn('role', [User::ROLE_ADMIN, User::ROLE_USER])->get();

    } elseif ($currentUser->isAdmin()) {

        $users = User::where('role', User::ROLE_USER)->get();
        
    } else {
        return redirect()->back()->with('error', 'Unauthorized access.');
    }
    
    return view('', compact('users'));
}
}
