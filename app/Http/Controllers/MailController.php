<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Client;

class MailController extends Controller
{
    public function store(Request $request)
    {
        $emails = $request->input('email');
        $mailData = [
            'title' => 'Mail from hassan',
            'body' => 'this is for testing email in laravel',
        ];
        Mail::to($emails)->send(new SendMail($mailData));
        //dd("Email is Sent.");
        return redirect()->route('calendar.index');

    }
}
