<?php

namespace App\Http\Controllers\Admin\SiteInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserHerosection;

class UserHerosectionController extends Controller
{
    public function UserHerosectionView()
    {
        // $allData = User::all();
        $data['allData'] = UserHerosection::all();
        return view('admin.herosection.view_herosection', $data);
    }

    public function UserHerosectionAdd()
    {
        return view('admin.herosection.add_herosection');
    }

    public function UserHerosectionStore(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $data = new UserHerosection();
        // Storing Image
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/herosection'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Herosection Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.herosection.view')->with($notification);
    } // End Method

    public function UserHerosectionEdit(Request $request,  $id)
    {
        $editData = UserHerosection::find($id);
        return view('admin.herosection.edit_herosection', compact('editData'));
    } // End Method

    public function UserHerosectionUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $data = UserHerosection::find($id);

        // Updating Image
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_siteinfo/herosection/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_siteinfo/herosection'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Herosection Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.herosection.view')->with($notification);
    } // End Method

    public function UserHerosectionDelete($id)
    {
        $data = UserHerosection::find($id);
        @unlink(public_path('upload/user_siteinfo/herosection/' . $data->image));
        $data->delete();

        $notification = array(
            'message' => 'Herosection Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.herosection.view')->with($notification);
    }
}
