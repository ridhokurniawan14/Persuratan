@extends('layouts.main')

@section('container')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Main content -->
        <div class="invoice p-3 mb-3">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <i class="fas fa-file-alt"></i> {{ $datas->no_surat }}/{{ strtoupper($datas->kode) }}.{{ $datas->nomor }}/{{ strtoupper($datas->sekolah) }} PGRI 1 GIRI/{{ $datas->kode_kab }}/{{ $datas->bulan_surat_romawi }}/{{ $datas->tahun_surat }}
                <small class="float-right">Tgl. : <?php echo date('d M Y', strtotime($datas->tanggal_surat)); ?></small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              dari <strong>SMK PGRI 1 GIRI Banyuwangi</strong>
              <address>
                Kode :<br>
                <strong>{{ ucwords($datas->kode . ' - ' . ucwords($datas->ket_yplp)) }}</strong><br>
                Kategori :<br>
                <strong>{{ ucwords($datas->kode . '.' . $datas->nomor . ' ' . ucwords($datas->ket)) }}</strong><br>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              ke <strong>{{ ucwords($datas->tujuan) }}</strong>
              <address>
              Perihal :<br>
              {{ ucfirst($datas->perihal) }}<br>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col ml-10">
              dibuat oleh <strong>{{ ucwords($datas->created_by) }}</strong>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-12 text-center">
              @if ($datas->file)
                <iframe class="m-2 col-sm-6 mx-auto p-1 d-block border border-secondary rounded" src="{{ asset('storage/' . $datas->file) }}" style="width: 100%; height: 600px;"></iframe>
                {{-- <img src="{{ asset('storage/' . $datas->file) }}" class="img-preview img-fluid m-2 col-sm-12 mx-auto p-1 d-block border border-secondary rounded"> --}}
              @else
                <div class="alert alert-danger alert-dismissible">
                  <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
                  Harap untuk melampirkan foto dokumen yang diperlukan agar proses administrasi dapat berjalan dengan baik dan tertata secara rapi.
                </div>
              @endif
            </div>
          </div>
          <!-- Table row -->
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-12">
              <a href="/surat-keluar/"><button type="button" class="btn btn-secondary">Back</button></a>
              @if ($datas->file)
                <a target="_blank" href="{{ asset('storage/'.$datas->file) }}" class="btn btn-primary float-right" download={{ str_replace(' ', '_', $datas->tujuan) }}_<?php echo date('d-m-Y', strtotime($datas->tanggal_surat)); ?>.{{ $file_extension }}><i class="fas fa-download"></i> Download File</a>
              @endif  
              <a href="/surat-keluar/{{ $datas->id }}/edit" class="btn btn-warning float-right mr-2"><span class="fas fa-pen"></span> Edit</a>
              <button class="btn btn-danger float-right mr-2" data-toggle="modal" data-target="#modal-delete{{ $datas->id }}"><span class="fas fa-trash"></span> Hapus</button>
            </div>
          </div>
          <div class="modal fade" id="modal-delete{{ $datas->id }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Apakah yakin Surat <b>{{ $datas->no_surat }}/{{ strtoupper($datas->kode) }}.{{ $datas->nomor }}/{{ strtoupper($datas->sekolah) }} PGRI 1 GIRI/{{ $datas->kode_kab }}/{{ $datas->bulan_surat_romawi }}/{{ $datas->tahun_surat }}</b> dihapus?</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <form action="/surat-keluar/{{ $datas->id }}" method="POST" class="d-inline">
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
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection
 