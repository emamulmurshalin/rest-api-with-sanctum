<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    public function returnApiResponse(array $response): JsonResponse
    {
        return response()->json($response, !empty($response['status_code']) ? $response['status_code'] : Response::HTTP_OK);
    }
}
