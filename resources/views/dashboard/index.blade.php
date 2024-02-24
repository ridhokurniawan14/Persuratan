@extends('layouts.main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            @if($keluarTanpaFilesuratkeluar->isNotEmpty() || $masukTanpaFilesuratmasuk->isNotEmpty())
              <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
                Harap untuk melampirkan foto dokumen yang diperlukan agar proses administrasi dapat berjalan dengan baik dan tertata secara rapi.
              </div>
            @endif  
          </div>
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                @if($data)
                  <h5>{{ $data->no_surat }}/{{ strtoupper($data->kode) }}.{{ $data->nomor }}/{{ strtoupper($data->sekolah) }} PGRI 1 GIRI/{{ $data->kode_kab }}/{{ $data->bulan_surat_romawi }}/{{ $data->tahun_surat }}</h5>
                @else
                    <h5>0/0.0/0 PGRI 1 GIRI/0/0/0</h5>
                @endif
                <p>Nomor Surat Keluar Terakhir</p>
              </div>
              <div class="icon">
                <i class="ion ion-information"></i>
              </div>
              <a class="small-box-footer"><i class="fas fa-info"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $total_suratkeluar }}</h3>

                <p>Surat Keluar di tahun {{ date("Y") }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-paper-airplane"></i>
              </div>
              <a href="surat-keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $total_suratmasuk }}</h3>

                <p>Surat Masuk di tahun {{ date("Y") }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-archive"></i>
              </div>
              <a href="/surat-masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">5 Surat Keluar Terakhir</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Perihal</th>
                      <th style="width: 85px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($count5keluar)
                        @foreach ($count5keluar as $count5keluars)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($count5keluars->perihal) }}</td>
                                <td align="center">
                                    <a href="surat-keluar/{{ $count5keluars->id }}" class="badge bg-info"><span class="fas fa-eye"></span></a>
                                    @if ($count5keluars->file)
                                      <a target="_blank" href="{{ asset('storage/'.$count5keluars->file) }}" class="badge bg-success" download="{{ str_replace(' ', '_', $count5keluars->tujuan) }}_<?php echo date('d-m-Y', strtotime($count5keluars->tanggal_surat)); ?>.{{ $file_extension }}"><i class="fas fa-download"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Tidak ada data yang tersedia</td>
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              
              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Surat Keluar belum ada foto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Perihal</th>
                      <th style="width: 100px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($keluarTanpaFilesuratkeluar)
                        @foreach ($keluarTanpaFilesuratkeluar as $keluarTanpaFilesuratkeluars)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $keluarTanpaFilesuratkeluars->perihal }}</td>
                                <td align="center">
                                    <a href="surat-keluar/{{ $keluarTanpaFilesuratkeluars->id }}" class="badge bg-danger"><span class="fas fa-upload mr-1"></span>UPLOAD FOTO</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Tidak ada data yang tersedia</td>
                        </tr>
                    @endif

                    {{-- @foreach ($keluarTanpaFilesuratkeluar as $keluarTanpaFilesuratkeluars)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $keluarTanpaFilesuratkeluars->perihal }}</td>
                      <td align="center">
                        <a href="surat-keluar/{{ $keluarTanpaFilesuratkeluars->id }}" class="badge bg-danger"><span class="fas fa-upload mr-1"></span>UPLOAD FOTO</a>
                      </td>
                    </tr>
                    @endforeach                     --}}
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">5 Surat Masuk Terakhir</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Perihal</th>
                      <th style="width: 85px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($count5masuk)
                        @foreach ($count5masuk as $count5masuks)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($count5masuks->perihal) }}</td>
                                <td align="center">
                                    <a href="surat-masuk/{{ $count5masuks->id }}" class="badge bg-info"><span class="fas fa-eye"></span></a>
                                    @if ($count5masuks->file)
                                        <a target="_blank" href="{{ asset('storage/'.$count5masuks->file) }}" class="badge bg-success" download="{{ str_replace(' ', '_', $count5masuks->alamat_pengirim) }}_<?php echo date('d-m-Y', strtotime($count5masuks->tanggal_surat)); ?>.{{ $file_extension }}"><i class="fas fa-download"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Tidak ada data yang tersedia</td>
                        </tr>
                    @endif

                    {{-- @foreach ($count5masuk as $count5masuks)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $count5masuks->perihal }}</td>
                      <td align="center">
                        <a href="surat-masuk/{{ $count5masuks->id }}" class="badge bg-info"><span class="fas fa-eye"></span></a>
                        @if ($count5masuks->file)
                          <a target="_blank" href="{{ asset('storage/'.$count5masuks->file) }}" class="badge bg-success" download={{ str_replace(' ', '_', $count5masuks->alamat_pengirim) }}_<?php echo date('d-m-Y', strtotime($count5masuks->tanggal_surat)); ?>.{{ $file_extension }}><i class="fas fa-download"></i></a>
                        @endif
                      </td>
                    </tr>
                    @endforeach --}}
                  </tbody>
                </table>
              </div>
              
              <!-- /.card-body -->
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Surat Masuk belum ada foto</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>No. Surat</th>
                      <th style="width: 100px"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($masukTanpaFilesuratmasuk)
                        @foreach ($masukTanpaFilesuratmasuk as $masukTanpaFilesuratmasuks)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $masukTanpaFilesuratmasuks->nomor_surat }}</td>
                                <td align="center">
                                    <a href="surat-masuk/{{ $masukTanpaFilesuratmasuks->id }}" class="badge bg-danger"><span class="fas fa-eye mr-1"></span>UPLOAD FOTO</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Tidak ada data yang tersedia</td>
                        </tr>
                    @endif

                    {{-- @foreach ($masukTanpaFilesuratmasuk as $masukTanpaFilesuratmasuks)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $masukTanpaFilesuratmasuks->nomor_surat }}</td>
                      <td align="center">
                        <a href="surat-masuk/{{ $masukTanpaFilesuratmasuks->id }}" class="badge bg-danger"><span class="fas fa-eye mr-1"></span>UPLOAD FOTO</a>
                      </td>
                    </tr>
                    @endforeach                     --}}
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
 