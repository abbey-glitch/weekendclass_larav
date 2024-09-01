<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class EmailController extends Controller
{
    //

    public function sendWelcomeEmail(){
        $toEmail = "h5i7h@example.com";
        $message = "Hello World";
        $subject = "welcome email in laravel using gmail";

        $response = Mail::to($toEmail)->send(new WelcomeEmail($message, $subject));
        dd($response);
    }
}
