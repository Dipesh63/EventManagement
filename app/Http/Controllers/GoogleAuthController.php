<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }




    // public function callbackbygoogle()
    // {
    //     try {
    //         $googleUser = Socialite::driver('google')->user();
    //        // dd($googleUser->getId()); // Debugging step

    //         $user = User::where('google_id', $googleUser->getId())->first();

    //         if (!$user) {
    //             $newUser = User::create([
    //                 'name' => $googleUser->getName(),
    //                 'email' => $googleUser->getEmail(),
    //                 'google_id' => $googleUser->getId(),
    //                 'password'  => "1234567"
                    
    //             ]);

    //             // Auth::login($newUser);
    //            // Auth::login($user);
    //             return redirect()->intended('dashboardnew2'); // Replace 'dashboard' if needed(login page)
    //         } else {
    //             Auth::login($user);
    //             return redirect()->intended('dashboardnew'); // Replace 'dashboard' if needed(profile page)
    //         }
    //     } catch (\Throwable $th) {
    //         // Print the exact error message for debugging
    //         dd('Something Went wrong! ' . $th->getMessage());
    //     }
    // }




    
    
    // The error occurs because your code attempts to create a new user even though a user with the same email (dipeshtalukdar35@gmail.com) already exists in the database. This violates the unique constraint on the email column in your users table.

    // Here's how to fix this issue:
    
    // Problem
    // The Google ID might not match an existing user, but the email already exists in the database.
    // Your code doesn't check if an existing user with the same email exists when creating a new user.
    // Solution
    // Before creating a new user, check if a user with the same email already exists, and update the Google ID for that user if necessary.



    public function callbackbygoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
    
            // Find a user by Google ID
            $user = User::where('google_id', $googleUser->getId())->first();
    
            if ($user) {
                // Log in the user if Google ID matches
                Auth::login($user);
                return redirect()->intended('dashboardnew'); // Profile page
            }
    
            // Check if a user with the same email already exists
            $existingUser = User::where('email', $googleUser->getEmail())->first();
    
            if ($existingUser) {
                // Update Google ID and log in the user
                $existingUser->update(['google_id' => $googleUser->getId()]);
                Auth::login($existingUser);
                return redirect()->intended('dashboardnew'); // Profile page
            }
    
            // Create a new user if no match found
            $newUser = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('1234567') // Use bcrypt to hash the password
            ]);
    
            Auth::login($newUser);
            return redirect()->intended('dashboardnew2'); // Login page
        } catch (\Throwable $th) {
            // Debug the exact error message
            dd('Something Went Wrong! ' . $th->getMessage());
        }
    }
    



}


    

