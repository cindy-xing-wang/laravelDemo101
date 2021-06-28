<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Checklist;
use App\Models\ChecklistLog;
use App\Models\OperationLog;
use Illuminate\Http\Request;
use App\Models\OpsLogBySiteView;
use Illuminate\Support\Facades\Auth;
use App\Exports\OpsLogViewMultiSheetExport;

class ChecklistLogController extends Controller
{
    public function index()
    {
                 
    }

    public function create()
    {
        $checklists = Checklist::get();
        $data = [
            'tasks' => $checklists,
        ];
        return view('checklistLog.create',compact('data'));
    }

    public function store(Request $request)
    {
        $opsData = [
            'lognote' => $request->lognote,
            'user_id' => auth()->user()->id,
        ];
        OperationLog::create($opsData);
        // Find the latest procedure log created by the user
        $operationLog = OperationLog::where('user_id',  Auth::user()->id)->latest()->first();
        
        $preFlightTasks = Checklist::get();
        $checklistCount = 0;
        foreach ($preFlightTasks as $preFlightTask) {
            $checklistId = $preFlightTask->id;
            if ($request->$checklistId) {
                $operationLogId = $operationLog->id;
                $checklistCount ++;
                $this->saveChecklist($operationLogId,$checklistId);
            }
        }
        if ($checklistCount == count($preFlightTasks)) {
            return redirect()->back()->with('message', 'The checklist was completed.');
        } else {
            return redirect()->back()->with('message', 'The checklist was not completed. A notification email will be sent to the Head Office.');
    
        }
    }

    public function saveChecklist($operationLogId, $checklistId)
    {
        $checklistData = [
            'checklist_id' => $checklistId,
            'operation_log_id' => $operationLogId,
        ];

        ChecklistLog::create($checklistData);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $checklist = OperationLog::find($id);
        return view('checklistLog.edit', compact('checklist'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->lognote;
        $checklist = OperationLog::find($id);

        $checklist->lognote = $data;
        $checklist->save();
        //should go to check method with date and display msg.
        // return redirect()->back()->with('message', 'Log Note updated successfully');
        return view('checklistLog.index')->with('message', 'log');
  
    }

    public function destroy(ChecklistLog $checklistLog)
    {
        //
    }

    public function check(Request $request)
    {
        // dd($request);
        $date = $request->date;
        // $checklists = PreFlight::where('created_at'->format('Y-m-d'), $date)->first();

        // find user role id, filter log results according to different roles
        if (Auth::user()->role_id==1) {
            $operationLogs = OperationLog::whereDate('created_at', $date)->get();
            return view('checklistLog.show',compact('operationLogs'));
        }
        if (Auth::user()->role_id==2|| Auth::user()->role_id==3) {
            $operationLogs = $this->filterOpsResult(Auth::user()->site_id, $date);
            // dd($checklistLogs);
            return view('checklistLog.show',compact('operationLogs'));
        }
    }

    public function filterOpsResult($site_id, $date)
    {
        $opsLogBySite = new OpsLogBySiteView();
        return $opsLogBySite->getOpsLog($site_id, $date);
    }

    public function exportIntoExcel($id)
    {
        // return Excel::download(new OpsLogViewExport($id), 'opsLogViewList.xlsx');
        return Excel::download(new OpsLogViewMultiSheetExport($id), 'opsLogViewList.xlsx');
    }
}
