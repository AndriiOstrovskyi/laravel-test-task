<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function jsonResponse($data, $statusCode = 200)
    {
        return response()->json($data, $statusCode);
    }

    protected function successResponse($data, $statusCode = 200)
    {
        return $this->jsonResponse($data, $statusCode);
    }

    protected function errorResponse($message, $statusCode)
    {
        return $this->jsonResponse(['error' => $message], $statusCode);
    }
}
