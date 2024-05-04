<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homepage extends Controller
{
    /**
     * Display the homepage view.
     */
    public function index()
    {
        return view('homepage');
    }
}
