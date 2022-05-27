<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.dashboard.users',['users'=>$users]);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('dashboard.users')->with('success','تم حذف المستخدم بنجاح');

    }
}
