<?php

use App\Http\Controllers\Admin\DataKriteriaController;
use App\Http\Controllers\Admin\DataRangeController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\NilaiProfilController;
use App\Http\Controllers\Admin\PenentuanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MyProfileController;
use App\Models\DataRangeKriteria;
use App\Models\JenisKriteria;
use App\Models\NilaiProfil;
use App\Models\Ranking;
use App\Models\Selisih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    // return view('landingpage');
    return view('auth.login');
});


Route::get('/bencana', function (Request $request) {
    $kabupatens = Ranking::all();
    $rankings = Ranking::orderBy('total_nilai', 'desc')->get();

    if ($request->search) {
        $rankings = Ranking::query()
            ->where('kabupaten', 'LIKE', "%$request->search%")
            ->orWhere('desa', 'LIKE', "%$request->search%")
            ->get() ?? null;
    }

    $kabupaten = 'default';

    return view('welcome', compact('rankings', 'kabupatens', 'kabupaten'));
});


Route::get('/detail/{id}', function ($id) {


    $rankings = Ranking::find($id);

    return view('detail', compact('rankings'));
});

Route::get('/kabupaten/{kabupaten}', function ($kabupaten) {
    $kabupatens = Ranking::all();
    $rankings = Ranking::where('kabupaten', $kabupaten)->orderBy('total_nilai', 'desc')->get();

    return view('welcome', compact('rankings', 'kabupatens', 'kabupaten'));
});

Route::get('/list-ranking', function () {
    $rankings = Ranking::orderBy('total_nilai', 'desc')->get();
    return view('welcome', compact('rankings'));
});



Route::get('/coba', function () {
    $nilai_profils = NilaiProfil::with('kecamatan', 'dataranges', 'dataranges.kriteria')->get();

    return view('coba', compact('nilai_profils'));
});



Route::get('/hitung', function () {
    $nilai_profils = NilaiProfil::with('kecamatan', 'dataranges', 'dataranges.kriteria')->get();

    $nol = Selisih::where('selisih', 0)->first();
    $satu = Selisih::where('selisih', 1)->first();
    $minSatu = Selisih::where('selisih', -1)->first();
    $dua = Selisih::where('selisih', 2)->first();
    $minDua =  Selisih::where('selisih', -2)->first();
    $tiga =  Selisih::where('selisih', 3)->first();
    $minTiga =  Selisih::where('selisih', -3)->first();
    $empat =  Selisih::where('selisih', 4)->first();
    $minEmpat =  Selisih::where('selisih', -4)->first();



    $coreFactor = JenisKriteria::where('name', 'Core Factor')->first();
    $secondaryFactor = JenisKriteria::where('name', 'Secondary Factor')->first();




    foreach ($nilai_profils as $nilai_profil) {


        $kriteria_nilai_dasar = $nilai_profil->dataranges->kriteria->nilai;
        $nilai_profil2 = $nilai_profil->dataranges->nilai;

        $gap = $nilai_profil2 - $kriteria_nilai_dasar;

        // if($gap == )

        // echo "gap  = $gap <br>";
        if ($gap == $nol->selisih) {
            $nilai_gap =  $nol->bobot_nilai;
        } elseif ($gap == $satu->selisih) {
            $nilai_gap =  $satu->bobot_nilai;
        } elseif ($gap == $dua->selisih) {
            $nilai_gap =  $dua->bobot_nilai;
        } elseif ($gap == $tiga->selisih) {
            $nilai_gap =  $tiga->bobot_nilai;
        } elseif ($gap == $empat->selisih) {
            $nilai_gap =  $empat->bobot_nilai;
        } elseif ($gap == $minSatu->selisih) {
            $nilai_gap =  $minSatu->bobot_nilai;
        } elseif ($gap == $minDua->selisih) {
            $nilai_gap =  $minDua->bobot_nilai;
        } elseif ($gap == $minTiga->selisih) {
            $nilai_gap =  $minTiga->bobot_nilai;
        } elseif ($gap == $minEmpat->selisih) {
            $nilai_gap =  $minEmpat->bobot_nilai;
        }

        $nama_kecamatan = $nilai_profil->kecamatan->name;

        if ($nilai_profil->dataranges->kriteria->jenis_kriteria->name === 'Core Factor') {
            $corefactor[] = [
                'nama_kecamatan' => $nama_kecamatan,
                'nilai_gap' => $nilai_gap
            ];
        }

        if ($nilai_profil->dataranges->kriteria->jenis_kriteria->name === 'Secondary Factor') {
            $secofactor[] = [
                'nama_kecamatan' => $nama_kecamatan,
                'nilai_gap' => $nilai_gap
            ];
        }
    }

    if (!isset($secofactor)) {
        return "kriteria secondary factor tidak ada di dalam tabel nilai profil";
    }



    $groupsecond = array();
    foreach ($secofactor as $item) {
        $key = $item['nama_kecamatan'];
        if (!array_key_exists($key, $groupsecond)) {
            $groupsecond[$key] = array(
                'nama_kecamatan' => $item['nama_kecamatan'],
                'nilai_gap' => $item['nilai_gap'],
            );
        } else {
            $groupsecond[$key]['nilai_gap'] = ($groupsecond[$key]['nilai_gap'] + $item['nilai_gap']) / 2;
        }
    }


    if (!isset($corefactor)) {
        return "kriteria core factor tidak ada di dalam tabel nilai profil";
    }

    $groups = array();
    foreach ($corefactor as $item) {
        $key = $item['nama_kecamatan'];
        if (!array_key_exists($key, $groups)) {
            $groups[$key] = array(
                'nama_kecamatan' => $item['nama_kecamatan'],
                'nilai_gap' => $item['nilai_gap'],
            );
        } else {
            $groups[$key]['nilai_gap'] = ($groups[$key]['nilai_gap'] + $item['nilai_gap']) / 2;
        }
    }




    foreach ($groupsecond as $g) {
        $hitungsecond[] = [
            "nama_kecamatan" => $g['nama_kecamatan'],
            "rata_rata_second" => $g['nilai_gap'],
        ];
    }

    $nomor = 0;

    Ranking::truncate();

    foreach ($groups as $g) {



        if (!isset($hitungsecond[$nomor])) {
            return $g['nama_kecamatan'] . ' tidak mempunyai kriteria secondary';
        }


        $rangking = Ranking::create([
            "nama_kecamatan" => $g['nama_kecamatan'],
            "rata_rata_core" => $g['nilai_gap'],
            "rata_rata_second" => $hitungsecond[$nomor]['rata_rata_second'] ?? $g['nilai_gap'],
            "total_nilai" => (0.6 * $g['nilai_gap']) + (0.4 * $hitungsecond[$nomor]['rata_rata_second']),
        ]);
        // $hitung[] = [
        //     "nama_kecamatan" => $g['nama_kecamatan'],
        //     "rata_rata_core" => $g['nilai_gap'],
        //     "rata_rata_second" => $hitungsecond[$nomor]['rata_rata_second'],
        //     "total_nilai" => (0.6 * $g['nilai_gap']) + (0.4 * $hitungsecond[$nomor]['rata_rata_second'])
        // ];
        $nomor++;
    }


    return redirect('/ranking');

    // return $hitungsecond[0]['rata_rata_second'];




})->middleware('auth');

Route::get('/ranking', function () {
    $nilai_profils = NilaiProfil::with('event', 'dataranges', 'dataranges.kriteria')->get();

    $nol = Selisih::where('selisih', 0)->first();
    $satu = Selisih::where('selisih', 1)->first();
    $minSatu = Selisih::where('selisih', -1)->first();
    $dua = Selisih::where('selisih', 2)->first();
    $minDua =  Selisih::where('selisih', -2)->first();
    $tiga =  Selisih::where('selisih', 3)->first();
    $minTiga =  Selisih::where('selisih', -3)->first();
    $empat =  Selisih::where('selisih', 4)->first();
    $minEmpat =  Selisih::where('selisih', -4)->first();

    $coreFactor = JenisKriteria::where('name', 'Core Factor')->first();
    $secondaryFactor = JenisKriteria::where('name', 'Secondary Factor')->first();

    foreach ($nilai_profils as $nilai_profil) {
        $kriteria_nilai_dasar = $nilai_profil->dataranges->kriteria->nilai;
        $nilai_profil2 = $nilai_profil->dataranges->nilai;
        $gap = $nilai_profil2 - $kriteria_nilai_dasar;
        // if($gap == )
        // echo "gap  = $gap <br>";
        if ($gap == $nol->selisih) {
            $nilai_gap =  $nol->bobot_nilai;
        } elseif ($gap == $satu->selisih) {
            $nilai_gap =  $satu->bobot_nilai;
        } elseif ($gap == $dua->selisih) {
            $nilai_gap =  $dua->bobot_nilai;
        } elseif ($gap == $tiga->selisih) {
            $nilai_gap =  $tiga->bobot_nilai;
        } elseif ($gap == $empat->selisih) {
            $nilai_gap =  $empat->bobot_nilai;
        } elseif ($gap == $minSatu->selisih) {
            $nilai_gap =  $minSatu->bobot_nilai;
        } elseif ($gap == $minDua->selisih) {
            $nilai_gap =  $minDua->bobot_nilai;
        } elseif ($gap == $minTiga->selisih) {
            $nilai_gap =  $minTiga->bobot_nilai;
        } elseif ($gap == $minEmpat->selisih) {
            $nilai_gap =  $minEmpat->bobot_nilai;
        }
        $nama_event = $nilai_profil->event->name;
        if ($nilai_profil->dataranges->kriteria->jenis_kriteria->name === 'Core Factor') {
            $corefactor[] = [
                'tanggal_event' => $nilai_profil->event->tanggal_event,
                'waktu_event' => $nilai_profil->event->waktu_event,
                'alamat_event' => $nilai_profil->event->alamat_event,
                'nama_penanggung_jawab' => $nilai_profil->event->nama_penanggung_jawab,
                'nama_event' => $nama_event,
                'nilai_gap' => $nilai_gap
            ];
        }
        if ($nilai_profil->dataranges->kriteria->jenis_kriteria->name === 'Secondary Factor') {
            $secofactor[] = [
                'tanggal_event' => $nilai_profil->event->tanggal_event,
                'waktu_event' => $nilai_profil->event->waktu_event,
                'alamat_event' => $nilai_profil->event->alamat_event,
                'nama_penanggung_jawab' => $nilai_profil->event->nama_penanggung_jawab,
                'nama_event' => $nama_event,
                'nilai_gap' => $nilai_gap
            ];
        }
    }

    if (!isset($secofactor)) {
        Alert::error('Error', 'Harap isi data terlebih dahalu');
        return back();
    }
    $groupsecond = array();
    foreach ($secofactor as $item) {
        $key = $item['nama_event'];
        if (!array_key_exists($key, $groupsecond)) {
            $groupsecond[$key] = array(
                'nama_event' => $item['nama_event'],
                'nilai_gap' => $item['nilai_gap'],
            );
        } else {
            $groupsecond[$key]['nilai_gap'] = ($groupsecond[$key]['nilai_gap'] + $item['nilai_gap']) / 2;
        }
    }

    if (!isset($corefactor)) {
        Alert::error('Error', 'Harap isi data terlebih dahalu');
        return back();
    }

    $groups = array();
    foreach ($corefactor as $item) {
        $key = $item['nama_event'];
        if (!array_key_exists($key, $groups)) {
            $groups[$key] = array(
                'tanggal_event' => $item['tanggal_event'],
                'waktu_event' => $item['waktu_event'],
                'alamat_event' => $item['alamat_event'],

                'nama_penanggung_jawab' => $item['nama_penanggung_jawab'],
                'nama_event' => $item['nama_event'],
                'nilai_gap' => $item['nilai_gap'],
            );
        } else {
            $groups[$key]['nilai_gap'] = ($groups[$key]['nilai_gap'] + $item['nilai_gap']) / 2;
        }
    }

    foreach ($groupsecond as $g) {
        $hitungsecond[] = [
            "nama_event" => $g['nama_event'],
            "rata_rata_second" => $g['nilai_gap'],
        ];
    }

    $nomor = 0;

    Ranking::truncate();

    foreach ($groups as $g) {

        if (!isset($hitungsecond[$nomor])) {
            return $g['nama_event'] . ' tidak mempunyai kriteria secondary';
        }

        $rangking = Ranking::create([
            'tanggal_event' => $g['tanggal_event'],
            'waktu_event' => $g['waktu_event'],

            'alamat_event' => $g['alamat_event'],

            'nama_penanggung_jawab' => $g['nama_penanggung_jawab'],
            "nama_event" => $g['nama_event'],
            "rata_rata_core" => $g['nilai_gap'],
            "rata_rata_second" => $hitungsecond[$nomor]['rata_rata_second'] ?? $g['nilai_gap'],
            "total_nilai" => (0.6 * $g['nilai_gap']) + (0.4 * $hitungsecond[$nomor]['rata_rata_second']),
        ]);
        $nomor++;
    }

    $rankings = Ranking::orderBy('total_nilai', 'desc')->get();

    return view('admin.rankings.index', compact('rankings'));
})->middleware('auth');


Route::middleware(['auth', 'verified'])->group(function () {
    //
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(MyProfileController::class)->group(function () {
        Route::get('/myprofile', 'index');
        Route::post('/myprofile', 'update');
    });




    Route::controller(DataKriteriaController::class)->group(function () {
        Route::get('/data-kriterias', 'index');
        Route::post('/data-kriterias', 'store');
        Route::get('/data-kriterias/destroy/{id}', 'destroy');
    });

    Route::controller(DataRangeController::class)->group(function () {
        Route::get('/data-ranges', 'index');
        Route::post('/data-ranges', 'store');
        Route::get('/data-ranges/destroy/{id}', 'destroy');
    });

    Route::controller(PenentuanController::class)->group(function () {
        Route::get('/penentuans', 'index');
        Route::post('/penentuans', 'store');
        Route::get('/penentuans/destroy/{id}', 'destroy');
    });

    Route::controller(NilaiProfilController::class)->group(function () {
        Route::get('/nilai-profils', 'index');
        Route::get('/nilai-profils/datarange/{id}', 'caridatarange');
        Route::post('/nilai-profils', 'store');
        Route::get('/nilai-profils/destroy/{id}', 'destroy');
    });

    Route::middleware(['auth', 'verified', 'role:super-admin|admin'])->group(function () {
        Route::controller(UserController::class)->prefix('users')->group(function () {
            Route::get('', 'index');
            Route::get('create', 'create');
        });
    });
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
