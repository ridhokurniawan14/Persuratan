@extends('layouts.main')

@section('container')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <div class="timeline">
              <div id="loader" style="display: none;">Loading...</div>
              @php $lastDate = null; @endphp
              @foreach($logs as $log)
                  @php $currentDate = $log->created_at->format('d M. Y'); @endphp
                  <!-- timeline time label -->
                  @if ($currentDate != $lastDate)
                      <div class="time-label">
                          <span class="bg-primary">{{ $currentDate }}</span>
                      </div>
                      @php $lastDate = $currentDate; @endphp
                  @endif
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <div>
                      <i class="fas {{ $log->iconClass }} {{ $log->logClass }}"></i>
                      
                      <div class="timeline-item">
                          {{-- <span class="time"><i class="fas fa-clock"></i> {{ $log->created_at->format('H:i') }}</span> --}}
                          <span class="time"><i class="fas fa-clock"></i> {{ $log->created_at->diffForHumans() }}</span>
                          <h3 class="timeline-header"><a href="#">{{ $log->name }}</a> <span style="color: {{ $log->logColor }};  font-weight: bold;">({{ strtoupper($log->log_name) }})</span></h3>
                          <div class="timeline-body">
                            {{ ucfirst($log->description) }}
                            @if ($log->file)
                                <span> dan {{ $log->file }}</span>
                            @endif
                          </div>
                      </div>
                  </div>
              @endforeach
                  <!-- END timeline item -->
                  <div>
                      <i class="fas fa-clock bg-gray"></i>
                  </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->

    </section>
    <!-- /.content -->
@endsection
 