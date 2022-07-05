<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminSiteInfo;

class AdminSiteInfoController extends Controller
{
    public function AdminSiteInfoEdit()
    {
        $editData = AdminSiteInfo::first();
        return view('admin.siteinfo.edit_admin_siteinfo', compact('editData'));
    }
}
