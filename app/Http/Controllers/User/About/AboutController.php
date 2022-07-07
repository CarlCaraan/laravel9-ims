<?php

namespace App\Http\Controllers\User\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function MissionVissionView()
    {
        return view('landing_page.about.view_mission_vision');
    }

    public function QualityPolicyView()
    {
        return view('landing_page.about.view_quality_policy');
    }

    public function MessageSDSView()
    {
        return view('landing_page.about.view_message_sds');
    }
}
