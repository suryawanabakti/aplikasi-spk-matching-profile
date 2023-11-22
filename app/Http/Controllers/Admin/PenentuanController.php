<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DataKriteria;
use App\Models\Event;
use App\Models\Kecamatan;
use App\Models\NilaiProfil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenentuanController extends Controller
{
    //
    public function index()
    {

        $kriterias = DataKriteria::with('ranges')->get();
        $events = Event::all();


        return view('admin.penentuans.index', compact('events', 'kriterias'));
    }

    public function destroy($id)
    {
        NilaiProfil::where('kecamatan_id', $id)->delete();

        Alert::success('Berhasil', 'Berhasil menghapus');
        return back();
    }
}
