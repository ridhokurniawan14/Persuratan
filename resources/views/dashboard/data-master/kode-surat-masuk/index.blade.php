@extends('layouts.main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Silahkan Masukkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="/data-master/kode-surat-masuk/">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="kode">Kode</label>
                    <input autofocus autocomplete="off" value="{{ old('kode') }}" required type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="Masukkan Kode">
                    @error('kode')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <input type="text" autocomplete="off" value="{{ old('ket') }}" required name="ket" class="form-control @error('ket') is-invalid @enderror"" id="ket" placeholder="Masukkan Keterangan">
                    @error('ket')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            {{-- Data Tabel --}}
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $tab_title }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $data)                   
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ strtoupper($data->kode) }}</td>
                    <td>{{ ucwords($data->ket) }}</td>
                    <td>
                      {{-- <a href="/data-master/kode-surat-masuk/{{ $data->kode }}" class="badge bg-info"><span class="fas fa-eye"></span></a> --}}
                      <a href="/data-master/kode-surat-masuk/{{ $data->id }}/edit" class="badge bg-warning"><span class="fas fa-pen"></span></a>
                      <button class="badge bg-danger border-0" data-toggle="modal" data-target="#modal-delete{{ $data->id }}"><span class="fas fa-trash"></span></button>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-delete{{ $data->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Apakah yakin kode <b>{{ strtoupper($data->kode) }} ({{ ucwords($data->ket) }})</b> dihapus?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <form action="{{ route('kode.destroy', ['id' => $data->id]) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="button" class="btn btn-default ml-auto" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Yakin</button>
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>   
                  @endforeach                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>            
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
 