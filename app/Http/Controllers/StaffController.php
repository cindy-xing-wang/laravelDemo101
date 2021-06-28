<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        if(Auth::user()->role->name=="Admin")
        {
            $staffs = User::get();
            return view('admin.staff.index',compact('staffs'));
        } elseif (Auth::user()->role->name=="Sub-admin") {
            $staffs = User::where('site_id','=',Auth::user()->site_id)->get();
            return view('admin.staff.index',compact('staffs'));
        }
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->back()->with('message','Staff added successfully');
    }

    public function show($id)
    {
        $staff = User::find($id);
        return view('admin.staff.delete', compact('staff'));
    }

    public function edit($id)
    {
        $staff = User::find($id);
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $this->validateUpdate($request, $id);
        $data = $request->all();
        $staff = User::find($id);
        $staff->update($data);
        return redirect()->route('staffs.index')->with('message', 'Staff info updated successfully');
    }

    public function destroy($id)
    {
        if(auth()->user()->id == $id){
            return redirect()->route('staffs.index')->with('message','You cannot delete yourself');
       } elseif ($id == '1' || $id == '2' || $id == '3') {
           return redirect()->route('staffs.index')->with('message','Please do not delete sample users');
       }
       $user = User::find($id);
       $userDelete = $user->delete();
        return redirect()->route('staffs.index')->with('message','User deleted successfully');
   }

    public function validateStore(Request $request){
        // dd($request);
        return  $this->validate($request,[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:64|unique:users,email',
            'password'=>'required|string|min:8|max:25',
            'role_id'=>'required',
            'site_id' => 'required',
       ]);
    }
    
       public function validateUpdate(Request $request, $id){
        return  $this->validate($request,[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:64',
            'role_id'=>'required',
            'site_id' => 'required',
       ]);
    }
}
