<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Str;
use App\Models\User;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function confirmEmail(Request $request)
    {
        $token = $request->query('token');

        // Find the user by token
        $user = User::where('email_verification_token', $token)->first();

        if ($user) {
            // Mark the email as verified
            $user->email_verified_at = now();
            $user->email_verification_token = null; // Remove the token
            $user->save();

            return redirect('/home')->with('status', 'Email verified!');
        } 
        else {
            return redirect('/')->with('error', 'Invalid token.');
        }
    }

}
