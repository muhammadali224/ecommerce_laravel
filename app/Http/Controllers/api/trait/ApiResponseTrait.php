<?php

namespace App\Http\Controllers\api\trait;

trait ApiResponseTrait
{
    public function ApiResponseSuccess($data = null, $message = null, $statusCode = null)
    {
        $array = [
            'data' => $data,
            'message' => $message,
            'status' => $statusCode,
        ];
        return response($array, $statusCode);
    }
    public function ApiResponseFaild($message = null, $error = null, $statusCode = null)
    {
        $array = [
            'message' => $message,
            'status' => $statusCode,
            'error' => $error
        ];
        return response($array, $statusCode);
    }
    public function ApiResponseSuccessInsert($message = "success insert")
    {
        $array = [
            'status' => 'success',
            'message' => $message,
        ];
        return response($array);
    }
}
