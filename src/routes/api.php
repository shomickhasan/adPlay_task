<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::any('{any}', function () {
    return response()->json([
        'status_code' => 404,
        'status' => 'error',
        'error' => 'Route not found.',
        'error_code' => [404],
        'success' => [],
        'success_code' => [],
        'data' => [],
    ], 404);
})->where('any', '.*');
