<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserInquiry;
use App\Mail\ContactReceiverMail;
use App\Mail\ContactSenderMail;
use Illuminate\Support\Facades\Mail;
use Auth;

class ContactController extends Controller
{
    public function ContactAdd()
    {
        return view('landing_page.contact.add_contact');
    }
    public function ContactStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50',
            'message' => 'required|min:12|max:400',
        ]);

        $data = new UserInquiry();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->message = $request->message;

        $data->save();

        // Working with Laravel Mailing
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Mail::to('bannedefused3@gmail.com')->send(new ContactReceiverMail($data)); // Receivers Email Address
        Mail::to($request->email)->send(new ContactSenderMail($data)); // Sender Email Address

        $notification = array(
            'message' => 'Inquiries sent Successfully, Thank you for reaching us!',
            'alert-type' => 'success',
        );
        return redirect()->route('user.contact.add')->with($notification);
    }
}
