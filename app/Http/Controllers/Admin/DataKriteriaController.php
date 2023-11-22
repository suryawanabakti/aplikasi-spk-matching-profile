<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DataKriteria;
use App\Models\DataRangeKriteria;
use App\Models\JenisKriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class DataKriteriaController extends Controller
{
    //
    public function index()
    {
        $kriterias = DataKriteria::all();
        $jenis_kriterias = JenisKriteria::all();
        return view('admin.kriterias.index', compact('kriterias', 'jenis_kriterias'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kriteria' => 'required',
            'jenis_kriteria_id' => 'required',
            'name' => 'required',
            'nilai' => 'required'
        ]);

        DataKriteria::create($validatedData);
        Alert::success('Success', 'Berhasil menambahkan data kriteria ' . $request->kode_kriteria);

        return back();
    }

    public function destroy($id)
    {
        DataRangeKriteria::where('data_kriteria_id', $id)->delete();
        DataKriteria::destroy($id);

        return back();
    }
}
