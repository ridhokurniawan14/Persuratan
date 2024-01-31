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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Surat">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Surat Keluar</label>
                    <div class="col-sm-2">
                        <select autofocus class="custom-select">
                            <option>Admin</option>
                            <option>Superadmin</option>
                        </select>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Sekolah</label>
                    <div class="col-sm-2">
                        <input type="text" value="smk" class="form-control" id="exampleInputEmail1" placeholder="smk">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Kode Kab.</label>
                    <div class="col-sm-2">
                      <input type="text" value="26" class="form-control" id="inputPassword3" placeholder="Kode Kabupaten">
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Bulan</label>
                    <div class="col-sm-2">
                        <select autofocus class="custom-select">
                            <option>Pilih Bulan</option>
                            <option value="i">I</option>
                            <option value="ii">II</option>
                            <option value="iii">III</option>
                            <option value="iv">IV</option>
                            <option value="v">V</option>
                            <option value="vi">VI</option>
                            <option value="vii">VII</option>
                            <option value="viii">VIII</option>
                            <option value="ix">IX</option>
                            <option value="x">X</option>
                            <option value="xi">XI</option>
                            <option value="xii">XII</option>
                        </select>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-2">
                      <input type="text" value="<?= date("Y") ?>" class="form-control" id="exampleInputEmail1" placeholder="Masukkan tahun">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">
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
 