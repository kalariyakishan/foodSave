<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message, $data = [])
    {
        $response = [
            'success' => true,
            'result'    => ['data' => $result],
            'message' => $message,
        ];

        if (!empty($data)) {
            $response = array_merge($response, $data);
        }

        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 200)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = (object)[];
        }
        return response()->json($response, $code);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponsePagination($result, $message, $data = [])
    {
    	$response = [
            'success' => true,
            'result'    => $result,
            'message' => $message,
        ];

        if(!empty($data)){
        	$response = array_merge($response, $data);
        }
        return response()->json($response, 200);
    }
}
