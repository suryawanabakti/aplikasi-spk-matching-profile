@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Rankings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Ranking</a></div>
                <div class="breadcrumb-item">Index</div>
            </div>
        </div>
        <div class="section-body">
            <div class="section-title">Data Ranking</div>
            <p class="section-lead">
                ini adalah table Ranking.
            </p>


            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kriteria Table</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="kriteriaTable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                Ranking
                                            </th>
                                            <th>Event</th>
                                            <th>Rata - Rata Core Factor</th>
                                            <th>Rata - Rata Secondary Factor</th>
                                            <th>Total Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp

                                        @foreach ($rankings as $rangking)
                                            <tr>
                                                <td>
                                                    @php $asd = $rankings[$loop->iteration -2]->total_nilai ?? null @endphp
                                                    @php
                                                        if ($asd != $rangking->total_nilai) {
                                                            echo $no++;
                                                        } else {
                                                            echo $nas = $no - 1;
                                                        }
                                                    @endphp
                                                    {{-- @php
                                        if($asd == $rangking->total_nilai)
                                        {
                                          echo $good = $loop->iteration - 1;
                                        } else {
                                          if(isset($good))
                                          {
                                             echo $loop->iteration;
                                          } else {
                                            
                                          }
                                        }
                                      @endphp --}}
                                                </td>
                                                <td>{{ $rangking->nama_event }}</td>
                                                <td>{{ $rangking->rata_rata_core }}</td>
                                                <td>{{ $rangking->rata_rata_second }}</td>
                                                <td>{{ $rangking->total_nilai }}</td>



                                            </tr>
                                        @endforeach

                                        {{-- {{ $rankings[]->total_nilai }} --}}
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
    <script></script>
@endpush
