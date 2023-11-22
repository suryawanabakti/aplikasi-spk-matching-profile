@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Kriteria baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Kriteria </a></div>
            <div class="breadcrumb-item">Index</div>
        </div>
    </div>
    <div class="section-body">
        <div class="section-title">Data Kriteria</div>
        <p class="section-lead">
            ini adalah table kriteria.
        </p>


        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Kriteria Table</h4>
                        <div class="card-header-action">

                            <a href="javascript:void(0)" data-toggle="modal" data-target="#modalAddKritera"  class="btn btn-primary"><i class="fas fa-user-plus"></i> Create </a>

                           
                            
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
                                  <th>Kode</th>
                                  <th>Nama</th>
                                  <th>Jenis</th>
                                  <th>Nilai Dasar</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>
                                      {{ $loop->iteration }}
                                    </td>
                                    <td>{{ $kriteria->kode_kriteria }}</td>
                                    <td>{{ $kriteria->name }}</td>
                                    <td>{{ $kriteria->jenis_kriteria->name }}</td>
                                    <td>{{ $kriteria->nilai }}</td>
                                   
                                    <td><a href="/data-kriterias/destroy/{{ $kriteria->id }}" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger">hapus</a></td>
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
<div class="modal fade" id="modalAddKritera" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah data kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="/data-kriterias" method="POST">
        @csrf
      <div class="modal-body">
        <div class="form-group">
          <label for="">Kode Kriteria</label>
          <input type="text" class="form-control" name="kode_kriteria">
        </div>
        <div class="form-group">
          <label for="">Jenis Kriteria</label>
          <select name="jenis_kriteria_id" id="jenis_kriteria_id" class="form-control">
            @foreach ($jenis_kriterias as $jenis_kriteria)
              <option value="{{ $jenis_kriteria->id }}">{{ $jenis_kriteria->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Nama Kriteria</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label for="#">Nilai Dasar</label>
          <input type="number" class="form-control" name="nilai">
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