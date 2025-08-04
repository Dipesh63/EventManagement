<?php

namespace App\Http\Controllers;

use sms_net_bd\SMS;
use Exception;

class SMSController extends Controller
{
    public function sendSMS($toNumber)
    {
        $sms = new SMS();

        try {
            // Send SMS to the dynamic number
            $response = $sms->sendSMS(
                "Hello, welcome to the Event Management System!",  // Message content
                $toNumber                                          // Recipient number
            );

            // Output response
            return response()->json([
                'success' => true,
                'data' => $response,
            ]);

        } catch (Exception $e) {
            // Handle errors
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
