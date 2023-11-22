@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Range Kriteria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Range Kriteria</a></div>
                <div class="breadcrumb-item">Index</div>
            </div>
        </div>
        <div class="section-body">
            <div class="section-title">Data Range Kriteria</div>
            <p class="section-lead">
                ini adalah table Range Kriteria.
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
                                            <th>Name</th>
                                            <th>Sub</th>
                                            <th>Nilai</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ranges as $range)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{ $range->kriteria?->name }}</td>
                                                <td>{{ $range->nama_sub_kriteria }}</td>
                                                <td>{{ $range->nilai }}</td>
                                                <td><a href="/data-ranges/destroy/{{ $range->id }}"
                                                        onclick="return confirm('Apakah anda yakin ?')"
                                                        class="btn btn-danger">hapus</a></td>
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
                <form action="/data-ranges" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Kriteria</label>
                            <select name="data_kriteria_id" id="data_kriteria_id" class="form-control">
                                @foreach ($data_kriterias as $data_kriteria)
                                    <option value="{{ $data_kriteria->id }}">{{ $data_kriteria->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sub Kriteria</label>
                            <input type="text" name="nama_sub_kriteria" id="nama_sub_kriteria" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nilai</label>
                            <input type="number" name="nilai" id="nilai" class="form-control" required>
                        </div>

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
