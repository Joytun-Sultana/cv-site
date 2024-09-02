<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BulkEmail;
use App\Mail\welcomeemail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $user = Auth::user();
        $toEmail = Auth::user()->email;
        $message = "Thank you for signing up <br>To complete your registration and start building your CV, please verify your email address by clicking the link below:";
        $subject = "Please Verify Your Email Address for CV-Site";
        $name = Auth::user()->name;

        $token = Str::random(60);

        // Save the token in the database, if necessary, for later verification
         $user->email_verification_token = $token;
         $user->save();


        Mail::to($toEmail)->send(new welcomeemail($name,$subject, $token));

        return view('viewnew');
        
    }
    public function reSendEmail(){
        $user = Auth::user();
        $toEmail = Auth::user()->email;
        //$message = "Thank you for signing up. To complete your registration and start building your CV, please verify your email address by clicking the link below:";
        $subject = "Please Verify Your Email Address for CV-Site";
        $name = Auth::user()->name;

        $token = Str::random(60);

        // Save the token in the database, if necessary, for later verification
         $user->email_verification_token = $token;
         $user->save();


        Mail::to($toEmail)->send(new welcomeemail($name,$subject, $token));

        return view('new-resend');
        
    }
    public function sendBulkEmail(Request $request)
    {

        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        // Get all users
        // $user = Auth::user();
        // $toEmail = Auth::user()->email;
        $users = User::all();

        // Message and subject to send
        // $message = "Hello, new feature added";
        // $subject = "From CV-site";

        $messageContent = $validatedData['message'];
        $subject = $validatedData['subject'];

       // Mail::to($toEmail)->send(new BulkEmail($message,$subject));

         foreach ($users as $user) {
            Mail::to($user->email)->send(new BulkEmail($messageContent, $subject));
            // Mail::to($user->email)->send(new BulkEmail($message, $subject));
         }
        return view('bulk');

        //return redirect()->back()->with('status', 'Bulk email sent to all registered users!');
    }
}






