<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminNotification;
use Auth;

class NotificationController extends Controller
{
    public function AdminGetNotification()
    {
        $allData = AdminNotification::with(['user'])->get();

        return response()->json($allData);
    } // End Method

    public function AdminGetNotificationBadge()
    {
        $allData = AdminNotification::where('seen_status', 'unseen')->where('status', 'task')->count();

        if ($allData == 0) {
            $allData = '';
        }

        return response()->json($allData);
    } // End Method

    public function AdminGetNotificationUpdate()
    {
        $updateData = AdminNotification::where('seen_status', 'unseen')->update(
            [
                'seen_status' => 'seen',
            ]
        );

        $allData = AdminNotification::where('seen_status', 'unseen')->where('status', 'task')->count();

        if ($allData == 0) {
            $allData = '';
        }

        return response()->json($allData);
    } // End Method

    public function AdminGetNotificationResolve()
    {
        $data = AdminNotification::where('status', 'resolved')->delete();

        $allData = AdminNotification::with(['user'])->get();

        return response()->json($allData);
    } // End Method
}
