<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = ActivityLog::orderBy('created_at', 'desc')->paginate(10); // Mengambil 10 data pertama

        foreach ($logs as $log) {
            switch ($log->log_name) {
                case 'Create':
                    $log->logClass = 'bg-green';
                    $log->iconClass = 'fa-plus';
                    $log->logColor = 'green'; // Hijau untuk log_name 'Create'
                    break;
                case 'Update':
                    $log->logClass = 'bg-warning';
                    $log->iconClass = 'fa-pencil-alt';
                    $log->logColor = '#DAA520'; // Kuning untuk log_name 'Update'
                    break;
                case 'Delete':
                    $log->logClass = 'bg-red';
                    $log->iconClass = 'fa-trash-alt';
                    $log->logColor = 'red'; // Merah untuk log_name 'Delete'
                    break;
                case 'Login':
                    $log->logClass = 'bg-blue';
                    $log->iconClass = 'fa-sign-in-alt';
                    $log->logColor = 'blue'; // Merah untuk log_name 'Delete'
                    break;
                case 'Logout':
                    $log->logClass = 'bg-second';
                    $log->iconClass = 'fa-sign-out-alt';
                    $log->logColor = 'gray'; // Merah untuk log_name 'Delete'
                    break;
                default:
                    $log->logClass = 'bg-blue';
                    $log->iconClass = 'fa-info';
                    $log->logColor = 'black'; // Warna default untuk log_name lainnya
                    break;
            }
        }
        
        return view('dashboard.logs.index', [
            "halaman" => "Log Activity",
            "title" => "Log Activity",
            "tab_title" => "Log Activity",
            "logs" => $logs
        ]);
    }
    public function loadMoreLogs(Request $request)
    {
        $page = $request->input('page'); // Ambil nomor halaman dari permintaan Ajax

        // Hitung jumlah data yang akan dilewati berdasarkan nomor halaman
        $skip = ($page - 1) * 10; // Menggunakan 10 sebagai jumlah data per halaman

        // Ambil data log aktivitas untuk halaman yang diminta
        $logs = ActivityLog::orderBy('created_at', 'desc')
                           ->skip($skip)
                           ->take(10) // Mengambil 10 data untuk setiap halaman
                           ->get();

        // Mengembalikan data dalam format yang sesuai untuk infinite scrolling
        return response()->json($logs);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityLog $activityLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityLog $activityLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityLog $activityLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityLog  $activityLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityLog $activityLog)
    {
        //
    }
}
