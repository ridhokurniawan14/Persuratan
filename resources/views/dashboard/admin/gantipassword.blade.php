@extends('layouts.main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <center>
      <div class="login-box">
        <div class="login-box-body">
          <div class="card card-outline card-primary">
            <div class="card-header text-center">
              <a href="#" class="h1"><b>Grisa</b>Sip</a>
            </div>
            <div class="card-body">
              <p class="login-box-msg">Akun Anda adalah Privacy Anda, Amankan Privacy Anda dengan Baik.</p>
              <form action="/ganti-password/{{ ucwords(auth()->user()->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="input-group mb-3">
                  <input name="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" id="oldpassword" placeholder="Password Lama">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  @error('oldpassword')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <input name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" id="newpassword"placeholder="Password Baru">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  @error('newpassword')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <input name="verpassword" type="password" class="form-control @error('verpassword') is-invalid @enderror" id="verpassword" placeholder="Confirm Password Baru">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                  @error('verpassword')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Change password</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
      </div>
    </center>
    </section>
    <!-- /.content -->
@endsection
 