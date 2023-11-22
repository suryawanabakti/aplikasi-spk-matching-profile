<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MyProfileController extends Controller
{
    //

    public function index()
    {
        return view('admin.myprofile.index');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        User::where('id', auth()->user()->id)->update($validatedData);

        Alert::success('Berhasil', 'berhasil mengganti password');
        return back();
    }
}
