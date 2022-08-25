<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index () {
        $data = auth()->user();
        return view('home', ['data' => $data]);
    }
    public function about () {
        $data = auth()->user();
        return view('about', ['data' => $data]);
    }
}
