<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $requests = ContactRequest::all();
        return view('admin.contact_requests', compact('requests'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:unresolved,in_progress,resolved'
        ]);

        $contactRequest = ContactRequest::findOrFail($id);
        $contactRequest->status = $request->status;
        $contactRequest->save();

        return redirect()->route('admin.contactRequests.index')->with('success', 'ステータスが更新されました。');
    }


    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'message' => 'required|string',
        ], [
            'name.required' => '名前を入力してください。',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => '正しいメールアドレスを入力してください',
            'message.required' => 'メッセージを入力してください。'
        ]);

        $contactRequest = ContactRequest::create($request->all());
        
        Mail::to('tukaburu13@gmail.com')->send(new ContactMail($contactRequest));

        return redirect()->to(route('haru') . '#contact')->with('success', 'お問い合わせありがとうございました。');

    }
}
