<?php

namespace App\Http\Controllers\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function __invoke()
    {
        return 111;
    }
}
