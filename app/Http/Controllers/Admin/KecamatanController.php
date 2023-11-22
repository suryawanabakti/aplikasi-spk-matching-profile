<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KecamatanController extends Controller
{
    //

    public function index()
    {
        $kecamatans = Kecamatan::all();

        return view('admin.kecamatans.index', compact('kecamatans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tgl_kejadian' => 'required',
            'name' => 'required'
        ]);

        Kecamatan::create($validatedData);
        Alert::success('Success' , 'Berhasil menambahkan kecamatan' . $request->name );
        return back();
    }

    public function destroy($id)
    {
        Kecamatan::destroy($id);

        return back();
    }
}
