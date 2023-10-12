<?php

use App\Http\Controllers\ZapierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//<!-- memberpress routes -->
Route::post('/save-membepress-user', [ZapierController::class, 'createMemberPressUser']);

Route::post('/save-memberpress-course-compeleted',[ZapierController::class, 'createMemberPressCourseCompletedRecords']);

Route::post('/save-memberpress-quiz-compeleted',[ZapierController::class, 'createMemberPressQuizRecordWhenCompleted']);





