<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function success($result, $message, $code = 200)
    {
        $response = [
            'success' => true,
            'code' => $code,
            'data' => $result,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    public function error($error, $errorMessages = [], $code = 500)
    {
        $response = [
            'success' => false,
            'code' => $code,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
