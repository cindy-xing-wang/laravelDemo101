<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OpsLogView extends Model
{
    use HasFactory;

    public static function getOpsLog($id)
    {
        $opsLogs = DB::table('ops_log_view')->where('id', $id)->select("*")->get()->toArray();
        // dd($checklist[0]);
        return $opsLogs;
    }
}
