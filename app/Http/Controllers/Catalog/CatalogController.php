<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Get\GetController;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index ()
    {
        $data = auth()->user();
        return view('catalog', ['data' => $data]);
    }
}
