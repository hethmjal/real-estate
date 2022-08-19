<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function index()
    {
        $messages = Message::get();
        return view('admin.dashboard.contactus.index',['messages'=>$messages]);
    }


    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect()->route('dashboard.messages')->with('success','تم حذف الرسالة بنجاح');
    }


}
