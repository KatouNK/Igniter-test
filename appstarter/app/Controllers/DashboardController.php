<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }
}
