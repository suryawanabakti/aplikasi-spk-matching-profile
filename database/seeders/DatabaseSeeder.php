<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin\DataKriteria;
use App\Models\DataRangeKriteria;
use App\Models\JenisKriteria;
use App\Models\Kecamatan;
use App\Models\NilaiProfil;
use App\Models\Selisih;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $super = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);

        $superAdmin = User::create([
            'name' => 'Master',
            'email' => 'square@super',
            'password' => bcrypt('qwerty123')
        ]);

        $superAdmin->assignRole($super);

        $admin1 = User::create([
            'name' => 'Admin Square',
            'email' => 'admin@admin',
            'password' => bcrypt('qwerty123')
        ]);
        $admin1->assignRole($admin);

        $user1 = User::create([
            'name' => 'Maya',
            'email' => 'maya@gmail.com',
            'password' => bcrypt('qwerty123')
        ]);
        $user1->assignRole($user);


        $user2 = User::create([
            'name' => 'Doddy',
            'email' => 'doddy@gmail.com',
            'password' => bcrypt('qwerty123')
        ]);
        $user2->assignRole($user);

        // Selisih::create([
        //     'selisih' => 0,
        //     'bobot_nilai' => 5,
        //     'keterangan' => 'Tidak Ada Selisih (kompetensi sesuai dengna yang dibutuhkan)'
        // ]);

        // Selisih::create([
        //     'selisih' => 1,
        //     'bobot_nilai' => 4.5,
        //     'keterangan' => 'Kompetensi Bencana kelebihan 1 tingkat/level'
        // ]);

        // // $table->integer('selisih'); 
        // // $table->double('bobot_nilai');
        // // $table->string('keterangan');

        // Selisih::create([
        //     'selisih' => -1,
        //     'bobot_nilai' => 4,
        //     'keterangan' => 'Kompetensi  Bencana kekurangan 1 tingkat/level'
        // ]);

        // Selisih::create([
        //     'selisih' => 2,
        //     'bobot_nilai' => 3.5,
        //     'keterangan' => 'Kompetensi  Bencana kelebihan 2 tingkat/level'
        // ]);

        // Selisih::create([
        //     'selisih' => -2,
        //     'bobot_nilai' => 3,
        //     'keterangan' => 'Kompetensi  Bencana kekurangan 2 tingkat/level'
        // ]);

        // Selisih::create([
        //     'selisih' => 3,
        //     'bobot_nilai' => 2.5,
        //     'keterangan' => 'Kompetensi Bencana kelebihan 3 tingkat/level'
        // ]);

        // Selisih::create([
        //     'selisih' => -3,
        //     'bobot_nilai' => 2,
        //     'keterangan' => 'Kompetensi  Bencanak kekurangan 3 tingkat/level'
        // ]);

        // Selisih::create([
        //     'selisih' => 4,
        //     'bobot_nilai' => 1.5,
        //     'keterangan' => 'Kompetensi Bencana kelebihan 4 tingkat/level'
        // ]);

        // Selisih::create([
        //     'selisih' => -4,
        //     'bobot_nilai' => 1,
        //     'keterangan' => 'Kompetensi  Bencana kekurangan 4 tingkat/level'
        // ]);


        // $jns1 = JenisKriteria::create([
        //     'name' => 'Core Factor',
        //     'value' => 60,
        // ]);

        // $jns2 = JenisKriteria::create([
        //     'name' => 'Secondary Factor',
        //     'value' => 40,
        // ]);

        // $data1 = DataKriteria::create([
        //     'kode_kriteria' => 'A02321',
        //     'jenis_kriteria_id' => $jns1->id,
        //     'name' => 'KK',
        //     'nilai' => 3 
        // ]);

        // $data2 = DataKriteria::create([
        //     'kode_kriteria' => 'A02322',
        //     'jenis_kriteria_id' => $jns1->id,
        //     'name' => 'Korban Jiwa',
        //     'nilai' => 3 
        // ]);

        // $data3 = DataKriteria::create([
        //     'kode_kriteria' => 'B02322',
        //     'jenis_kriteria_id' => $jns2->id,
        //     'name' => 'Kerusakan',
        //     'nilai' => 2 
        // ]);

        // $datarange1 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data1->id,
        //     'nama_sub_kriteria' => '< 3',
        //     'nilai' => 1
        // ]);

        // $datarange2 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data1->id,
        //     'nama_sub_kriteria' => '>= 5 dan < 10',
        //     'nilai' => 2
        // ]);

        // $datarange3 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data1->id,
        //     'nama_sub_kriteria' => '>= 10 dan < 20',
        //     'nilai' => 3
        // ]);

        // $datarange4 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data1->id,
        //     'nama_sub_kriteria' => '>= 20',
        //     'nilai' => 4
        // ]);

        // $datarange5 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data2->id,
        //     'nama_sub_kriteria' => 'Jumlah Korban <10',
        //     'nilai' => 1
        // ]);

        // $datarange6 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data2->id,
        //     'nama_sub_kriteria' => 'Jumlah Korban >= 10 dan < 30',
        //     'nilai' => 2
        // ]);

        // $datarange7 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data2->id,
        //     'nama_sub_kriteria' => 'Jumlah Korban >= 20 dan < 40',
        //     'nilai' => 3
        // ]);

        // $datarange8 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data2->id,
        //     'nama_sub_kriteria' => 'Jumlah Korban <40',
        //     'nilai' => 4
        // ]);

        // $datarange9 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data3->id,
        //     'nama_sub_kriteria' => '10 Unit',
        //     'nilai' => 1
        // ]);



        // $datarange10 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data3->id,
        //     'nama_sub_kriteria' => '>=10 Unit < 20',
        //     'nilai' => 2
        // ]);

        // $datarange11 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data3->id,
        //     'nama_sub_kriteria' => '>=20 Unit < 30',
        //     'nilai' => 3
        // ]);

        // $datarange12 = DataRangeKriteria::create([
        //     'data_kriteria_id' => $data3->id,
        //     'nama_sub_kriteria' => '> 30 Unit',
        //     'nilai' => 4
        // ]);


        // $nilaiprofil1 = NilaiProfil::create([
        //     'kecamatan_id' => $makassar->id,
        //     'data_range_kriteria_id' => $datarange2->id
        // ]);


        // $nilaiprofil2 = NilaiProfil::create([
        //     'kecamatan_id' => $makassar->id,
        //     'data_range_kriteria_id' => $datarange5->id
        // ]);


        // $nilaiprofil3 = NilaiProfil::create([
        //     'kecamatan_id' => $makassar->id,
        //     'data_range_kriteria_id' => $datarange10->id
        // ]);

        // $nilaiprofil4 = NilaiProfil::create([
        //     'kecamatan_id' => $tamalate->id,
        //     'data_range_kriteria_id' => $datarange1->id
        // ]);

        // $nilaiprofil5 = NilaiProfil::create([
        //     'kecamatan_id' => $tamalate->id,
        //     'data_range_kriteria_id' => $datarange5->id
        // ]);

        // $nilaiprofil6 = NilaiProfil::create([
        //     'kecamatan_id' => $tamalate->id,
        //     'data_range_kriteria_id' => $datarange9->id
        // ]);

        // $nilaiprofil7 = NilaiProfil::create([
        //     'kecamatan_id' => $panakukang->id,
        //     'data_range_kriteria_id' => $datarange1->id
        // ]);

        // $nilaiprofil8= NilaiProfil::create([
        //     'kecamatan_id' => $panakukang->id,
        //     'data_range_kriteria_id' => $datarange5->id
        // ]);

        // $nilaiprofil9= NilaiProfil::create([
        //     'kecamatan_id' => $panakukang->id,
        //     'data_range_kriteria_id' => $datarange9->id
        // ]);

        // $nilaiprofil10= NilaiProfil::create([
        //     'kecamatan_id' => $manggala->id,
        //     'data_range_kriteria_id' => $datarange1->id
        // ]);

        // $nilaiprofil11= NilaiProfil::create([
        //     'kecamatan_id' => $manggala->id,
        //     'data_range_kriteria_id' => $datarange6->id
        // ]);

        // $nilaiprofil12= NilaiProfil::create([
        //     'kecamatan_id' => $manggala->id,
        //     'data_range_kriteria_id' => $datarange11->id
        // ]);




    }
}
