@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Users</a></div>
            <div class="breadcrumb-item">Index</div>
        </div>
    </div>
    <div class="section-body">
        <div class="section-title">Data Users</div>
        <p class="section-lead">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, laboriosam.
        </p>


        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Users Table</h4>
                        <div class="card-header-action">

                            <a href="/users/create" class="btn btn-primary"><i class="fas fa-user-plus"></i> Create </a>

                            <div class="btn-group">
                                <a href="#" class="btn btn-primary"><i class="fas fa-file-import"></i> Import</a>
                                <a href="#" class="btn btn-primary"><i class="fas fa-file-export"></i> Export</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="usersTable">
                              <thead>
                                <tr>
                                  <th class="text-center">
                                    #
                                  </th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Foto</th>
                                  <th>Created At</th>
                                  <th>Role</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                      1
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td class="align-middle">
                                      {{ $user->email }}
                                    </td>
                                    <td>
                                      <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian">
                                    </td>
                                    <td>2018-01-20</td>
                                    <td><div class="badge badge-success">{{ $user->getRoleNames()[0] }}</div></td>
                                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
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
        $('#usersTable').DataTable()
    })
</script>
    
@endpush