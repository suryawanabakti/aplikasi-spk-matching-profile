<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DataKriteria;
use App\Models\DataRangeKriteria;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataRangeController extends Controller
{
    //
    public function index()
    {
        $ranges = DataRangeKriteria::all();
        $data_kriterias = DataKriteria::all();
        return view('admin.ranges.index', compact('ranges','data_kriterias'));
    }

    public function destroy($id)
    {
        DataRangeKriteria::destroy($id);

        return back();
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'data_kriteria_id' => 'required',
            'nama_sub_kriteria' => 'required',
            'nilai' => 'required'
        ]);

        DataRangeKriteria::create($validatedData);

        Alert::success('Success' , 'Berhasil menambahkan sub kriteria '. $request->nama_sub_kriteria);
        
        return back();

    }
}
