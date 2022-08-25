<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class CabinetController extends Controller
{
    public function index()
    {
        $data = auth()->user();
        return view('cabinet', ['data' => $data]);
    }


}
