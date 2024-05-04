<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display the homepage view.
     */
    public function index()
    {
        return view('homepage');
    }
}
