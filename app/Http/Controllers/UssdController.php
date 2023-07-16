<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UssdController extends Controller
{
    public function handleUssdRequest(Request $request)
    {
        $payload = $request->getContent();
        $data = json_decode($payload, true);

        // Retrieve the USSD request data
        $ussdRequest = $data['ussd_request'];

        // Extract the necessary information
        $sessionID = $ussdRequest['SESSION_ID'];
        $msisdn = $ussdRequest['MSISDN'];
        $shortcode = $ussdRequest['SHORTCODE'];

        // Process the USSD request logic here
        // ...

        // Return the USSD response
        $response = [
            'RESPONSE_TYPE' => 1,
            'SEQUENCE_NO' => $ussdRequest['SEQUENCE_NO'] + 1,
            'SESSION_ID' => $sessionID,
            'MSISDN' => $msisdn,
            'SHORTCODE' => $shortcode,
            'MESSAGE' => 'This is your USSD response message.',
        ];

        return response()->json($response);
    }
}


