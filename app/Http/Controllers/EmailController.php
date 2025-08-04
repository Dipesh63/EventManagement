<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Event;
use App\Models\EventApplication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
   

    // public function sendWelcomeEmail(){
        

    //     $toEmail = 'talukder2007063@stud.kuet.ac.bd';
    //     $msg = 'Welcome to my EventManagement System';
    //     $subject = 'welcome Email in Laravel using Gmail';


    //     //Mail::to($toEmail)->send(new WelcomeEmail($msg,$subject));
    //    $response =  Mail::to($toEmail)->send(new WelcomeEmail($msg,$subject));
    //    dd($response);
    // }



//     public function sendWelcomeEmail($event_id)
// {
//     // Check if event_id is valid or process the logic accordingly
//     if (!$event_id) {
//         // Handle invalid event_id case if needed
//         return response()->json(['status' => 'error', 'message' => 'Event ID is missing.']);
//     }



//     $organizer_id = Event::where('id', $event_id)->value('user_id');
//     $admittedUser_id = Auth::id();
//     $toEmail = User::where('id', $admittedUser_id)->value('email');
//     $fromEmail = User::where('id', $organizer_id)->value('email');



//     // Example email content (You can customize this based on your needs)
//     $msg = 'Welcome to the Event Management System!';  // Dynamic message
//     $subject = 'Welcome Email';  // Dynamic subject

//     // Send the email using the WelcomeEmail Mailable
//     Mail::to($toEmail)->send(new WelcomeEmail($msg, $subject, $fromEmail, $toEmail));




//     $toNumber = User::where('id', $admittedUser_id)->value('mobile');

//     return response()->json(['status' => 'success', 'message' => 'Email sent successfully.']);

    
// }


public function sendWelcomeEmail($event_id)
{
    if (!$event_id) {
        return response()->json(['status' => 'error', 'message' => 'Event ID is missing.']);
    }

    $organizer_id = Event::where('id', $event_id)->value('user_id');
    $admittedUser_id = Auth::id();
    $toEmail = User::where('id', $admittedUser_id)->value('email');
    $fromEmail = User::where('id', $organizer_id)->value('email');

    // Email content
    $msg = 'Welcome to the Event Management System!';
    $subject = 'Welcome Email';

    // Send email
    Mail::to($toEmail)->send(new WelcomeEmail($msg, $subject, $fromEmail, $toEmail));

    // Fetch recipient mobile number
    $toNumber = User::where('id', $admittedUser_id)->value('mobile');

    // Send SMS
    if ($toNumber) {
        $smsController = new SMSController();
        $smsResponse = $smsController->sendSMS($toNumber);
    }

    return response()->json(['status' => 'success', 'message' => 'Email and SMS sent successfully.']);
}


}
