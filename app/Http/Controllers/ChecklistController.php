<?php

namespace App\Http\Controllers;

use App\Models\Checklist;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    public function index()
    {
        // display checklist table && add new checklist table
        $checklists = Checklist::get();
        // dd($checklists);
        return view('checklists.index',compact('checklists'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $checklistData = [
            'stepNum' => 1,
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            // 'image' => $request->image,
        ];

        Checklist::create($checklistData);
        return redirect()->route('checklists.index');
    }

    public function show($id)
    {
        $checklist = Checklist::find($id);
        return view('checklists.delete', compact('checklist'));
    }

    public function edit($id)
    {
        $checklist = Checklist::find($id);
        return view('checklists.edit', compact('checklist'));
    }

    public function update(Request $request, $id)
    {
        $checklist = Checklist::find($id);
        $checklist->delete();
        $checklistData = [
            'stepNum' => 1,
            'name' => $request->task,
            'user_id' => auth()->user()->id,
        ];

        Checklist::create($checklistData);
        return redirect()->route('checklists.index');
   
    }

    public function destroy($id)
    {
        $checklist = Checklist::find($id);
        $checklist->delete();
        return redirect()->route('checklists.index');
    }
}
