<?php

namespace App\Http\Utils;

use Illuminate\Http\JsonResponse;

class Response
{

    /**
     * Success Response
     *
     * @param mixed $data
     * @param int $status_code
     * @return JsonResponse
     */
    public static function success(mixed $data, int $status_code = 200): JsonResponse
    {
        return response()->json([
            "data" => $data,
        ], $status_code);
    }

    /**
     * Unauthorized Response
     * @param mixed $data
     * @param int $status_code
     * @return JsonResponse
     */
    public static function unauthorized(mixed $data, int $status_code = 401): JsonResponse
    {
        return response()->json([
            "data" => $data
        ], $status_code);
    }
}
