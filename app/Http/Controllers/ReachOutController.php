<?php

namespace App\Http\Controllers;

use App\Mail\LandingPageInquiryMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ReachOutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = User::firstOrCreate(
            [
                'email' => 'rick@mfrholdings.com',
            ],
            [
                'name' => 'Rick Retzko',
                'password' => Hash::make('password'),
            ]
        );

        Mail::to($user)->send(new LandingPageInquiryMail($request['email'], $request['message'],$request['name']));

        return back()->with('success', 'Your email has been sent!');
    }
}
