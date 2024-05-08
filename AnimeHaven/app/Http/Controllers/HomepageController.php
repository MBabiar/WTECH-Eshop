<?php

namespace App\Http\Controllers;

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
