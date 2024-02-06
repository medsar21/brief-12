<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

class AccountController extends Controller
{
    // This method will show user registration page 
    public function registration()
    {
        return view('front.account.registration');
    }

    public function processRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->passes()) {
            // If validation passes, you can proceed with registration logic here
            // For example:
            // User::create($request->all());
            // return redirect()->route('home');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // This is method will show user login page 
    public function login()
    {
        // Add logic to show login page
    }
}
