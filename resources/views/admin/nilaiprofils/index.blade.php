@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Nilai Profils</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Nilai Profils</a></div>
                <div class="breadcrumb-item">Index</div>
            </div>
        </div>
        <div class="section-body">
            <div class="section-title">Data Nilai Profil</div>
            <p class="section-lead">
                ini adalah table Nilai Profil.
            </p>


            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kriteria Table</h4>
                            <div class="card-header-action">

                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modalAddRange"
                                    class="btn btn-primary"><i class="fas fa-user-plus"></i> Create </a>



                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="kriteriaTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Event</th>

                                            <th>Kriteria</th>
                                            <th>Sub Kriteria</th>
                                            <th>Nilai Profil</th>
                                            <th>Nilai Standar</th>
                                            <th>GAP</th>
                                            <th>Nilai GAP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $nol = \App\Models\Selisih::where('selisih', 0)->first();
                                            $satu = \App\Models\Selisih::where('selisih', 1)->first();
                                            $minSatu = \App\Models\Selisih::where('selisih', -1)->first();
                                            $dua = \App\Models\Selisih::where('selisih', 2)->first();
                                            $minDua = \App\Models\Selisih::where('selisih', -2)->first();
                                            $tiga = \App\Models\Selisih::where('selisih', 3)->first();
                                            $minTiga = \App\Models\Selisih::where('selisih', -3)->first();
                                            $empat = \App\Models\Selisih::where('selisih', 4)->first();
                                            $minEmpat = \App\Models\Selisih::where('selisih', -4)->first();
                                        @endphp
                                        @foreach ($nilai_profils as $nilai_profil)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $nilai_profil->event->name }} </td>

                                                <td>{{ $nilai_profil->dataranges->kriteria->name }}</td>
                                                <td>{{ $nilai_profil->dataranges->nama_sub_kriteria }}</td>
                                                <td>{{ $nilai_profil->dataranges->nilai }}</td>
                                                <td>{{ $nilai_profil->dataranges->kriteria->nilai }}</td>
                                                <td>
                                                    @php
                                                        echo $gap = $nilai_profil->dataranges->nilai - $nilai_profil->dataranges->kriteria->nilai;

                                                    @endphp
                                                </td>
                                                <td>
                                                    @php
                                                        if ($gap == $nol->selisih) {
                                                            echo $nilai_gap = $nol->bobot_nilai;
                                                        } elseif ($gap == $satu->selisih) {
                                                            echo $nilai_gap = $satu->bobot_nilai;
                                                        } elseif ($gap == $dua->selisih) {
                                                            echo $nilai_gap = $dua->bobot_nilai;
                                                        } elseif ($gap == $tiga->selisih) {
                                                            echo $nilai_gap = $tiga->bobot_nilai;
                                                        } elseif ($gap == $empat->selisih) {
                                                            echo $nilai_gap = $empat->bobot_nilai;
                                                        } elseif ($gap == $minSatu->selisih) {
                                                            echo $nilai_gap = $minSatu->bobot_nilai;
                                                        } elseif ($gap == $minDua->selisih) {
                                                            echo $nilai_gap = $minDua->bobot_nilai;
                                                        } elseif ($gap == $minTiga->selisih) {
                                                            echo $nilai_gap = $minTiga->bobot_nilai;
                                                        } elseif ($gap == $minEmpat->selisih) {
                                                            echo $nilai_gap = $minEmpat->bobot_nilai;
                                                        }
                                                    @endphp
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).ready(() => {
            $('#kriteriaTable').DataTable()
        })
    </script>
@endpush

@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="modalAddRange" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah data kritera</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="/nilai-profils" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Event</label>
                            <select name="event_id" id="event_id" class="form-control">
                                @foreach ($events as $event)
                                    <option value="{{ $event->id }}">{{ $event->name }},
                                        {{ $event->tgl_kejadian }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach ($kriterias as $kriteria)
                            <div class="form-group">
                                <label for="">{{ $kriteria->name }}</label>
                                <select name="data_range_kriteria_id[{{ $kriteria->id }}]" id=""
                                    class="form-control">
                                    @foreach ($kriteria->ranges as $range)
                                        <option value="{{ $range->id }}">{{ $range->nama_sub_kriteria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script></script>
@endpush
