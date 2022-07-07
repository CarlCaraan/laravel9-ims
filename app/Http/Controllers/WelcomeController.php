<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSiteInfo;

class WelcomeController extends Controller
{
    public function WelcomeView()
    {
        $allData['userSiteInfos'] = UserSiteInfo::first();

        return view('landing_page.index', $allData);
    }
}
