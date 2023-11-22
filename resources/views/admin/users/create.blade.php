@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Users</a></div>
            <div class="breadcrumb-item">Create</div>
        </div>
    </div>
    <div class="section-body">
        <div class="section-title">Create</div>
        <p class="section-lead">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, necessitatibus.
        </p>
                <form>
                    <div class="row">
                        <div class="col-6">
                            <div class="card card-primary">
                                <div class="card-header">Biodata & Password</div>
                                <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" class="form-control" name="name" id="addName">
                                            </div>
                                            <div class="form-group">
                                                <label for="addEmail">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <div class="input-group-text">
                                                        <i class="fas fa-envelope"></i>
                                                      </div>
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="Email" name="email" id="addEmail">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="addEmail">Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                      <div class="input-group-text">
                                                        <i class="fas fa-lock"></i>
                                                      </div>
                                                    </div>
                                                    <input type="password" class="form-control" placeholder="Password" name="password" id="addPassword">
                                                </div>
                                            </div>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-icon icon-left btn-primary"><i class="far fa-save"></i> Save a User</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card card-primary">
                                <div class="card-header">Upload Image</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="" width="250px">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
    </div>
</section>

@endsection