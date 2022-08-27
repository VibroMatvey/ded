<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class CabinetController extends Controller
{
    public function index()
    {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        if ($userRole == 'ADMIN') {
            return redirect('/cabinet/admin');
        } elseif ($userRole == 'GUEST') {
            return redirect('/');
        }

        return view('cabinet', ['data' => $userData, 'role' => $userRole]);
    }

    public function admin()
    {
        $userData = new UserResource(auth()->user(User::with('role')->select('role')));
        if (isset($userData->role)) {
            $userRole = $userData->role->title;
        } else {
            $userRole = 'GUEST';
        }

        if ($userRole != 'ADMIN') {
            return redirect('/cabinet');
        }

        return view('admin', ['data' => $userData, 'role' => $userRole]);
    }


}
