<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); // this refers to resources/views/home.blade.php
    }
}
