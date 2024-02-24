@extends('layouts.main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Silahkan Masukkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="/admin/{{ $user->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input name="name" autofocus required autocomplete="off" value="{{ old('name', $user->name) }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama">
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" required autocomplete="off" value="{{ old('email', $user->email) }}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email">
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" required type="password" value="{{ old('password') }}"  class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Massukkan Password">
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="hidden" name="oldImage" value="{{ $user->foto }}">
                    @if ($user->foto)
                      <img src="{{ asset('storage/' . $user->foto) }}" class="img-preview img-fluid pl-0 mb-3 col-sm-5 d-block">
                    @else
                      <img class="img-preview img-fluid pl-0 mb-3 col-sm-5 d-block">
                    @endif
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input name="foto" required type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" onchange="previewImage('foto')">
                        <label class="input-group-text" for="foto">Pilih File</label>
                        @error('foto')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select name="is_superadmin" required class="custom-select @error('is_superadmin') is-invalid @enderror">
                      <option value="">Pilihan Kategori</option>
                      <option value="0" {{ old('is_superadmin', $user->is_superadmin) == "0" ? 'selected' : ''  }}>Admin</option>
                      <option value="1" {{ old('is_superadmin', $user->is_superadmin) == "1" ? 'selected' : ''  }}>Superadmin</option>
                    </select>
                    @error('is_superadmin')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Update</button>
                  <a href="/admin/"><button type="button" class="btn btn-secondary">Kembali</button></a>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
              </div>
            @endif
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $data)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ ucwords($data->name) }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                          {{-- <a href="/admin/{{ $data->email }}" class="badge bg-info"><span class="fas fa-eye"></span></a> --}}
                          <a href="/admin/{{ $data->id }}/edit" class="badge bg-warning"><span class="fas fa-pen"></span></a>
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
                              <p>Apakah yakin admin <b>{{ $data->name }}</b> dihapus?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <form action="{{ route('email.destroy', ['id' => $data->id]) }}" method="post" class="d-inline">
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
                    <th>Nama</th>
                    <th>Email</th>
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
 