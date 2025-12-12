<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemoriesController extends Controller
{
    public function index()
    {
        return view('memories.index');
    }
}