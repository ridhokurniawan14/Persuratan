@extends('layouts.main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- right column -->
          <div class="col-md-12">
            {{-- Data Tabel --}}
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h3 class="card-title">{{ $tab_title }}</h3>
                <a href="/surat-masuk/create" class="btn btn-primary ml-3 col-sm-2 float-right"><i class="fas fa-pen nav-icon mr-2"></i>Input Surat Masuk</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>No. Surat</th>
                    <th>Kode</th>
                    <th>Pengirim</th>
                    <th>Tgl.</th>
                    <th>No. Surat</th>
                    <th>Created</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($datas as $data)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->no_surat }}</td>
                      <td>{{ strtoupper($data->kode) }}</td>
                      <td>{{ ucwords($data->alamat_pengirim) }}</td>
                      <td><?php echo date('d-m-Y', strtotime($data->tanggal_surat)); ?></td>
                      <td>{{ $data->nomor_surat }}</td>
                      <td>
                        @if(strpos($data->created_by, " ") !== false)
                            {{ ucwords(substr($data->created_by, 0, strpos($data->created_by, " "))) }}
                        @else
                            {{ ucwords($data->created_by) }}
                        @endif
                      </td>
                      <td>
                        <a href="/surat-masuk/{{ $data->id }}" class="badge bg-info"><span class="fas fa-eye"></span></a>
                        <a href="/surat-masuk/{{ $data->id }}/edit" class="badge bg-warning"><span class="fas fa-pen"></span></a>
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
                            <p>Apakah yakin Surat <b>{{ $data->nomor_surat }}</b> dihapus?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <form action="/surat-masuk/{{ $data->id }}" method="POST" class="d-inline">
                              @method('DELETE')
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
                    <th>No. Surat</th>
                    <th>Kode</th>
                    <th>Pengirim</th>
                    <th>Tgl.</th>
                    <th>No. Surat</th>
                    <th>Created</th>
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
 