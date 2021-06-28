<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChecklistLogView extends Model
{
    use HasFactory;

    public static function getChecklistLog($opsId)
    {
        $checklistLogs = DB::table('checklist_log_view')
        ->where('operation_log_id', $opsId)
        // ->where('procedureId','1')
        // ->where(['operation_id', $opsId],['procedure_id', '1'])
        ->select("*")
        ->get()
        ->toArray();
        return $checklistLogs;
    }
}
