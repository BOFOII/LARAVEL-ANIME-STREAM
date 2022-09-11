<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailerController extends Controller
{
    public function sendMailContact(Request $request) {
        $request->validate([
            'name' => ['required', 'string'],
            'email_address' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);
        Mail::to(__('pages.support_mail'))->send(new ContactMail($request->name, $request->email_address, $request->subject, $request->message));
        return back()->with('success', "<script>
        swal('Good job!', 'Terimakasih telah menghubungi kami!', 'success');
    </script>");
    }
}
