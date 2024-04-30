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
        //dd($request->message);
        $emails = $request->input('email');
        $message = $request->input('message');
        $emailCLient = Client::where('email',$emails)->first();

        $mailData = [
            'nom' => $emailCLient->nom,
            'title' => 'email from hassan',
            'body' => $message,
        ];
        

        Mail::to($emails)->send(new SendMail($mailData));
        return redirect()->back();
    } 
}
