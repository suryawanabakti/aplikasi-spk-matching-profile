@extends('layouts.app')

@section('content')
    @php
        error_reporting(0);
    @endphp
    <section class="section">
        <div class="section-header">
            <h1>Penentuan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Penentuan</a></div>
                <div class="breadcrumb-item">Index</div>
            </div>
        </div>
        <div class="section-body">
            @if ($errors->any())
                {{ $errors }}
            @endif
            <div class="section-title"> Penentuan</div>
            <p class="section-lead">
                ini adalah table Penentuan.
            </p>


            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Penentuan Table</h4>
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
                                            <th>Tanggal </th>
                                            <th>Event</th>
                                            <th>Alamat </th>
                                            @foreach ($kriterias as $kriteria)
                                                <th>{{ $kriteria->name }}</th>
                                            @endforeach

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $nomor2 = 1;
                                            $nomor = 0;
                                        @endphp
                                        @foreach ($events as $event)
                                            @if ($event->nilais->isNotEmpty())
                                                <tr>
                                                    <td>
                                                        {{ $nomor2 }}
                                                    </td>
                                                    <td>{{ $event->tanggal_event }}</td>
                                                    <td>{{ $event->name }}</td>
                                                    <td>{{ $event->alamat_event }}</td>

                                                    @foreach ($kriterias as $kriteria)
                                                        <td>{{ $event->nilais[$nomor]->dataranges->nama_sub_kriteria }}
                                                        </td>
                                                        @php
                                                            $nomor++;
                                                        @endphp
                                                    @endforeach

                                                    <td><a href="/penentuans/destroy/{{ $event->id }}"
                                                            onclick="return confirm('Apakah anda yakin?')"
                                                            class="#">hapus</a></td>

                                                    @php
                                                        $nomor = 0;
                                                        $nomor2++;
                                                    @endphp
                                                    {{-- <td><a href="/data-events/destroy/{{ $event->id }}" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger">hapus</a></td> --}}
                                                </tr>
                                            @endif
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
        <div class="modal-dialog modal-lg" role="document">
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
                            <label for="">Nama Event</label>
                            <input type="text" name="nama_event" class="form-control">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">Tanggal Event</label>
                                <input type="date" name="tanggal_event" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Waktu Event</label>
                                <input type="time" name="waktu_event" id="" class="form-control">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="">Alamat Event</label>
                            <input type="text" name="alamat_event" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Penanggun Jawab</label>
                            <textarea name="nama_penanggung_jawab" id="nama_penanggung_jawab" cols="30" rows="10" class="form-control"></textarea>
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
    <script>
        $(document).ready(() => {
            $.ajax({
                url: "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/73.json",
                method: "GET",
                success: function(data) {
                    data.forEach(element => {
                        $('#kabupaten').append(
                            `<option value="${element.name}">${element.name}</option>`)
                    });
                }
            })
        })
    </script>
@endpush
