<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserInquiry;

class ContactController extends Controller
{
    public function ContactAdd()
    {
        return view('landing_page.contact');
    }
    public function ContactStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50',
            'message' => 'required|min:12|max:50',
        ]);

        $data = new UserInquiry();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->message = $request->message;

        $data->save();

        $notification = array(
            'message' => 'Inquiries sent Successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('user.contact.add')->with($notification);
    }
}
