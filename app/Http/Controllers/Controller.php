<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Return a success response.
     */
    protected function successResponse($message, $data = null)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ]);
    }

    /**
     * Return an error response.
     */
    protected function errorResponse($message, $statusCode)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
        ], $statusCode);
    }
}
