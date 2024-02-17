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
              <form method="POST" action="/surat-keluar/{{ $surat_keluar->id }}" class="form-horizontal" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                    <div class="col-sm-2">
                      <input value="{{ old('no_surat',  $surat_keluar->no_surat) }}" autofocus required type="number" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" placeholder="No. Urut Surat">
                      @error('no_surat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <label for="kode_surat_keluar" class="col-sm-1 col-form-label">Kode Surat</label>
                    <div class="col-sm-2">
                      <select name="kode_surat_keluar" class="custom-select">
                        <option>Pilih Kode</option>
                        @foreach ($categories as $category)
                          <option required value="{{ $category->id }}" {{ old('kode_surat_keluar', $surat_keluar->kode_surat_keluar) == $category->id ? 'selected' : '' }}>
                              {{ ucwords($category->kode) }}.{{ ucwords($category->nomor) }} {{ ucwords($category->shortName) }}</option>
                        @endforeach
                      </select>
                      @error('kode_surat_keluar')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <label for="tujuan" class="col-sm-1 col-form-label">Tujuan</label>
                    <div class="col-sm-4">
                      <input value="{{ old('tujuan', $surat_keluar->tujuan) }}" autocomplete="off" required type="text" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" placeholder="Masukkan Tujuan">
                      @error('tujuan')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tanggal_surat" class="col-sm-1 col-form-label">Tanggal</label>
                    <div class="col-sm-2">
                      <input value="{{ old('tanggal_surat', $surat_keluar->tanggal_surat) }}" required type="date" name="tanggal_surat" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat">
                      @error('tanggal_surat')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <label for="file" class="col-sm-1 col-form-label">File</label>
                    <div class="col-sm-3">
                      <div class="input-group">
                        <div class="custom-file">
                          <input name="file" type="file" class="form-control @error('file') is-invalid @enderror" id="file" onchange="previewImage('file')">
                          <label class="input-group-text" for="file">Pilih File</label>
                          @error('file')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror                        
                        </div>
                      </div>
                    </div>
                    <label for="perihal" class="col-sm-1 col-form-label">Perihal</label>
                    <div class="col-sm-4">
                      <textarea required name="perihal" class="form-control @error('perihal') is-invalid @enderror" rows="3" placeholder="Perihal Surat">{{ old('perihal', $surat_keluar->perihal) }}</textarea>
                      @error('perihal')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <input type="hidden" name="oldImage" value="{{ $surat_keluar->file }}">
                      @if ($surat_keluar->file)
                        <img src="{{ asset('storage/' . $surat_keluar->file) }}" class="img-preview img-fluid mt-3 col-sm-6 mx-auto p-1 d-block border border-secondary rounded">
                      @else
                        <img class="img-preview img-fluid mt-3 col-sm-6 mx-auto d-block">
                      @endif
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning float-right">Update</button>
                  <button type="reset" class="btn btn-default float-right mr-2">Reset</button>
                  <a href="/surat-keluar/"><button type="button" class="btn btn-secondary">Back</button></a>
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
 