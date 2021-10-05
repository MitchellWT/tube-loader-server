<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TokenController;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/tokens', [TokenController::class, 'store'])
        ->name('token_store');

Route::middleware('auth:sanctum')->post('/videos', [VideoController::class, 'store'])
                                    ->name('video_store');

Route::middleware('auth:sanctum')->get('/videos', [VideoController::class, 'show'])
                                    ->name('video_show');

Route::middleware('auth:sanctum')->get('/videos/multiple', [VideoController::class, 'showMulti'])
                                    ->name('video_showMulti');

Route::middleware('auth:sanctum')->delete('/videos', [VideoController::class, 'destroy'])
                                    ->name('video_delete');

Route::get('/*', function() {
    return response()->noContent(Response::HTTP_UNAUTHORIZED);
})->name('login');