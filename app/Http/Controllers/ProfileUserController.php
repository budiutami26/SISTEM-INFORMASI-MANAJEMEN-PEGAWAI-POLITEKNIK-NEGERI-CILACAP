<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileUserController extends Controller
{
    public function index()
    {
        return view('profileuser.profile');
    }
}
