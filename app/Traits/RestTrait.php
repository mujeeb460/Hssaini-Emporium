<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait RestTrait
{

    /**
     * Send a success response with data.
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendSuccessResponse($data, $message = 'Success', $statusCode = 200)
    {
        return response()->json($data, $statusCode);
        // return response()->json([
        //     'success' => true,
        //     'data' => $data,
        //     'message' => $message,
        // ], $statusCode);
    }

    /**
     * Send an error response.
     *
     * @param  string  $message
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendErrorResponse($message, $statusCode = 200)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $statusCode);
    }

    /**
     * Send a custom response.
     *
     * @param  mixed  $data
     * @param  int  $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendCustomResponse($data, $statusCode = 200)
    {
        return response()->json($data, $statusCode);
    }
}
