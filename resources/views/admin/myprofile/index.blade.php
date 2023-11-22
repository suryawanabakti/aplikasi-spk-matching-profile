@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header"> <h1>My Profile</h1></div>
    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Profile</div>
                    <div class="card-body">
                        <form action="/myprofile" method="POST">
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Password Confirmation</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection