<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DataKriteria;
use App\Models\DataRangeKriteria;
use App\Models\Event;
use App\Models\Kecamatan;
use App\Models\NilaiProfil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NilaiProfilController extends Controller
{
    //
    public function index()
    {
        $nilai_profils = NilaiProfil::all();
        $kriterias = DataKriteria::with('ranges')->get();
        $events = Event::all();
        return view('admin.nilaiprofils.index', compact('nilai_profils', 'kriterias', 'events'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required',
            'data_range_kriteria_id' => 'required'
        ]);



        $event = Event::create([
            'name' => $request->nama_event,
            'tanggal_event' => $request->tanggal_event ?? null,
            'waktu_event' => $request->waktu_event,
            'alamat_event' => $request->alamat_event,
            'nama_penanggung_jawab' => $request->nama_penanggung_jawab,
        ]);

        foreach ($request->data_range_kriteria_id as $data_range_kriteria_id) {
            NilaiProfil::create([
                'event_id' => $event->id,
                'data_range_kriteria_id' => $data_range_kriteria_id
            ]);
        }

        Alert::success('Success', 'Berhasil menambahkan nilai profil');
        return back();
    }

    public function destroy($id)
    {
        NilaiProfil::destroy($id);

        return back();
    }

    public function caridatarange($id)
    {
        return DataRangeKriteria::find($id);
    }
}
