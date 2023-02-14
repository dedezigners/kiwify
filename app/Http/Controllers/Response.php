<?php

namespace App\Http\Controllers;

class Response
{
    public static function success($data = null, $code = 200)
    {
        return response()->json([
            'success' => true,
            'errors' => null,
            'data' => $data
        ], $code);
    }
}
