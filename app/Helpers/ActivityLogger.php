<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    public static function logActivity($action, $name, $file = null)
    {
        $logName = ucfirst($action);
        $description = '';

        switch ($action) {
            case 'create':
                $description = "telah membuat data $name baru";
                break;
            case 'update':
                $description = "telah memperbarui data $name";
                break;
            case 'delete':
                $description = "telah menghapus data $name";
                break;
        }

        if ($file) {
            $description .= " dan telah mengupload file/foto dengan sukses";
        }

        ActivityLog::create([
            'log_name' => $logName,
            'name' => Auth::user()->name,
            'description' => $description,
            'file' => $file ? 'telah mengupload file/foto dengan sukses' : null
        ]);
    }
}