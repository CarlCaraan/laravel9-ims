<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserHerosection;

class WelcomeController extends Controller
{
    public function WelcomeView()
    {
        $data['herosections'] = UserHerosection::get();
        return view('landing_page.index', $data);
    }
}
