<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Client;
use Termwind\Components\BreakLine;

use function Laravel\Prompts\alert;

class MailController extends Controller
{
    public function store(Request $request)
    {
        $emails = $request->input('email');
        $emailCLient = Client::where('email',$emails)->first();
        //dd($emailCLient);

        $mailData = [
            'nom' => $emailCLient->nom,
            'title' => 'email from hassan',
            'body' => 'this is for testing email in laravel',
        ];
        Mail::to($emails)->send(new SendMail($mailData));
        
        //return;
        //dd("Email is Sent.");
        return redirect()->route('calendar.index');

    }
}
