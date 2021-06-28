<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpsLogBySiteView extends Model
{
    use HasFactory;

    public static function getOpsLog($site_id,$date)
    {
        $opsLogs = DB::table('ops_log_by_site_view')
        ->where('site_id', $site_id)
        ->whereDate('created_at', $date)
        ->select("*")->get()->toArray();
        return $opsLogs;
    }
}
