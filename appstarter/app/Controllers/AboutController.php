<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('about');
    }
}
