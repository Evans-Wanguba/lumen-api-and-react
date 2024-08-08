<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
* @OA\Info(
*      version="1.0.0",
*      title="J Winston API Documentation",
*      description="Shipping freight",
*      @OA\Contact(
*          email="ewanguba@gmail.com"
*      ),
* )
*/

/**
*  @OA\Server(
*      url="http://localhost:8000/api/",
*      description="Host"
*  )
*
*/

/**
* @OA\SecurityScheme(
*   securityScheme="Authorization",
*   type="apiKey",
*   in="header",
*   name="Authorization"
* )
*/

class Controller extends BaseController
{
    protected function errorResponse($message, $errors=null, $code=422) {
        if($message == null && is_string($errors))
            $message = $errors;
        return response()->json([
            'errors' => $errors,
            'data' => null,
            'message' => $message,
            'status' => 'error'
            ], $code);
    }

    protected function successResponse($message, $data=null, $code=200) {
        return response()->json([
            'errors' => null,
            'data' => $data,
            'message' => $message,
            'status' => 'success'
        ], $code);
    }
}
