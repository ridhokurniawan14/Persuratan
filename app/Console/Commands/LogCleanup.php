<?php

namespace App\Console\Commands;

use App\Models\ActivityLog;
use Carbon\Carbon;
use Illuminate\Console\Command;

class LogCleanup extends Command
{
    protected $signature = 'log:cleanup';
    protected $description = 'Clean up old activity logs';

    public function handle()
    {
        // Hitung tanggal 3 minggu yang lalu
        $threeWeeksAgo = Carbon::now()->subWeeks(3);

        // Hapus data log aktivitas yang lebih dari 3 minggu
        ActivityLog::where('created_at', '<', $threeWeeksAgo)->delete();

        $this->info('Activity logs older than three weeks have been cleaned up.');
    }
}
