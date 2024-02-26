@extends('layouts.main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Silahkan Masukkan Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="/surat-masuk/{{ $surat_masuk->id }}" class="form-horizontal" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-1">
                      <input value="{{ old('no_surat',  $surat_masuk->no_surat) }}" autofocus required type="number" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" placeholder="No. Urut Surat">
                      @error('no_surat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <label for="kode_surat_masuk" class="col-sm-2 col-form-label">Kode Surat Masuk</label>
                    <div class="col-sm-2">
                      <select autofocus name="kode_surat_masuk" class="custom-select">
                        <option>Pilih Kode</option>
                        @foreach ($categories as $category)
                          <option required value="{{ $category->id }}" {{ old('kode_surat_masuk', $surat_masuk->kode_surat_masuk) == $category->id ? 'selected' : '' }}>
                              {{ strtoupper($category->kode) }}-{{ ucwords($category->ket) }}</option>
                        @endforeach
                      </select>
                      @error('kode_surat_masuk')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <label for="alamat_pengirim" class="col-sm-2 col-form-label">Pengirim dari</label>
                    <div class="col-sm-3">
                      <input value="{{ old('alamat_pengirim',  $surat_masuk->alamat_pengirim) }}" required type="text" name="alamat_pengirim" class="form-control @error('alamat_pengirim') is-invalid @enderror" id="alamat_pengirim" placeholder="Pengirim dari / Nama Instansi">
                      @error('alamat_pengirim')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tanggal_surat" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-4">
                      <input value="{{ old('tanggal_surat', $surat_masuk->tanggal_surat) }}" required type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat">
                      @error('tanggal_surat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-4">
                      <input value="{{ old('nomor_surat', $surat_masuk->nomor_surat) }}" autocomplete="off" required type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" placeholder="Masukkan Nomor Surat">
                      @error('nomor_surat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="perihal" class="col-sm-1 col-form-label">Perihal</label>
                    <div class="col-sm-6">
                      <textarea required name="perihal" class="form-control @error('perihal') is-invalid @enderror" rows="3" placeholder="Perihal Surat">{{ old('perihal', $surat_masuk->perihal) }}</textarea>
                      @error('perihal')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <label for="file" class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <div class="custom-file">
                          <input name="file" type="file" class="form-control @error('file') is-invalid @enderror" id="file" onchange="previewFile('file')">
                          {{-- <input name="file" type="file" class="form-control @error('file') is-invalid @enderror" id="file" onchange="previewImage('file')"> --}}
                          <label class="input-group-text" for="file">Pilih File</label>
                          @error('file')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="oldImage" value="{{ $surat_masuk->file }}">
                    @if ($surat_masuk->file)
                      <iframe class="m-2 col-sm-6 mx-auto p-1 d-block border border-secondary rounded" src="{{ asset('storage/' . $surat_masuk->file) }}" style="width: 100%; height: 600px;"></iframe>
                    @endif
                      <div id="filePreview" class="mt-3 col-sm-6 mx-auto d-block"></div>
                      {{-- <img class="img-preview img-fluid mt-3 col-sm-6 mx-auto d-block"> --}}
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning float-right">Update</button>
                  <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
                  <a href="/surat-masuk/"><button type="button" class="btn btn-secondary">Back</button></a>
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
 