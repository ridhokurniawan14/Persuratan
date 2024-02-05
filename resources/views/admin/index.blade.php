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
              <form action="/admin" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input name="name" required autocomplete="off" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama">
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" required autocomplete="off" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email">
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
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="foto" required type="file" value="{{ old('foto') }}" class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                        <label class="custom-file-label" for="foto">Pilih file</label>
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
                    <select name="kategori" value="{{ old('kategori') }}" required class="custom-select @error('kategori') is-invalid @enderror">
                      <option>Pilihan Kategori</option>
                      <option value="0">Admin</option>
                      <option value="1">Superadmin</option>
                    </select>
                    @error('kategori')
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
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>
                          <a href="/admin/{{ $data->email }}" class="badge bg-info"><span class="fas fa-eye"></span></a>
                          <a href="#" class="badge bg-warning"><span class="fas fa-pen"></span></a>
                          <form action="/admin/{{ $data->email }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span class="fas fa-trash"></span></button>
                          </form>
                        </td>
                      </tr>                  
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
 