<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index () {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        if ($userRole == 'ADMIN') {
            return redirect('/cabinet/admin');
        }

        return view('home', ['data' => $userData, 'role' => $userRole]);
    }
    public function about () {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        if ($userRole == 'ADMIN') {
            return redirect('/cabinet/admin');
        }

        return view('about', ['data' => $userData, 'role' => $userRole]);
    }
}
