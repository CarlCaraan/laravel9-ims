<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function WelcomeView()
    {
        return view('landing_page.index');
    }
}
