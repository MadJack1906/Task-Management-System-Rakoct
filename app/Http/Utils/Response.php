<?php

namespace App\Http\Utils;

use Illuminate\Http\JsonResponse;

class Response
{
    public static function success(mixed $data, int $status_code = 200): JsonResponse
    {
        return response()->json($data, $status_code);
    }
}
