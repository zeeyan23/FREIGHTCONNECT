<?php

namespace App\Http\Controllers;
use App\Models\leads;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Sheets;
use Google_Service_Sheets_ValueRange;

class FormController extends Controller
{
    public function submit(Request $request)
    {
       $validated = validator($request->all(), [
            'email' => 'required|email|unique:leads,email',
        ], [
            'email.unique' => 'This email is already registered.',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validated->errors()
            ], 422);
        }

        leads::create($request->all());

         $client = new Google_Client();
        $client->setApplicationName('Laravel Sheets');
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig(storage_path('app/google-credentials.json'));

        $service = new Google_Service_Sheets($client);

        $spreadsheetId = '1xshFJ9nXwSGH8g6m6c8MIya29CVv-PDc-6dHom8W0a4';
        $range = 'Sheet1!A:K';

        $values = [
            [
                $request->company ?? '',
                $request->contact_person ?? '',
                $request->email ?? '',
                $request->phone ?? '',
                $request->full_phone ?? '',
                $request->dial_code ?? '',
                $request->country_iso ?? '',
                $request->country ?? '',
                $request->business_type ?? '',
                $request->products ?? '',
                now()->format('Y-m-d H:i:s')
            ]
        ];

        $body = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        try {
            $service->spreadsheets_values->append(
                $spreadsheetId,
                $range,
                $body,
                $params
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        $service->spreadsheets_values->append(
            $spreadsheetId,
            $range,
            $body,
            $params
        );


        return response()->json([
            'status' => 'success',
            'message' => 'Registered successfully!'
        ]);
    }
}
