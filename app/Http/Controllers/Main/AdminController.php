<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('main.index');
    }
}
