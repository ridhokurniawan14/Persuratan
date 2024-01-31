@extends('layouts.main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Silahkan Masukkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Surat Masuk</label>
                    <div class="col-sm-2">
                      <select autofocus class="custom-select">
                        <option>Admin</option>
                        <option>Superadmin</option>
                      </select>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pengirim dari</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Instansi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control" id="inputPassword3">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Surat">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-5">
                      {{-- <te type="text" class="form-control" id="inputPassword3"> --}}
                      <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Save</button>
                  <button type="reset" class="btn btn-default">Reset</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
 