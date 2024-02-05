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
              <form action="login.html" method="post">
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password Lama">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password Baru">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Confirm Password Baru">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
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
 