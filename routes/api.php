<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\RelationshipController;
use Illuminate\Support\Facades\Response;

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

// make API Group
Route::group(['prefix' => '/v1', /* 'middleware' => 'auth:sanctum'*/], function() {
    
    Route::post("/register", [AuthController::class, 'register']);
    Route::apiResource("lessons", LessonController::class); //->withoutMiddleware("auth.basic")
    Route::apiResource("users", UserController::class);
    Route::apiResource("tags", TagController::class);
    
    // get all lessons from one user with ID
    Route::get("users/{id}/lessons", [RelationshipController::class, "userLessons"]);
    
    // get all tags from one lesson with ID
    Route::get("lessons/{id}/tags", [RelationshipController::class, "lessonTags"]);
    
    // // get all lessons from one tag with ID
    Route::get("tags/{id}/lessons", [RelationshipController::class, "tagLessons"]);

    Route::any("lesson", function() {
        $message = "Please type lessons insted lesson";
        return Response::json($message, 404);
    });

    // Route::redirect("lesson", "lessons");


// Route::get("lessons", function() {
    //     return Lesson::all();
// });

// Route::get("lessons/{id}", function($id) {
//     return Lesson::findOrFail($id);
// });
// // ->where(['id' => '[0-9]+', 'title' => '[a-z]+']);

// Route::post("lessons", function(Request $resquest) {
//     return Lesson::create($resquest->all());
// });

// Route::put("lessons/{id}", function(Request $request, $id) {
//     $lesson = Lesson::findOrFail($id);
//     $lesson->update($request->all());

//     return $lesson;
// });

// Route::delete("lessons/{id}", function($id) {
//     $lesson = Lesson::findOrFail($id)->delete();

//     return "Deleted Success!";
// });


});

// Route::domain("account.laravep_api.local")->group(function() {
//     Route::get("/lessons", function() {
//         return Lesson::all();
//     });
// });

// Route::get("lessons/{lesson:slug}", function($lesson) {
//     return $lesson;
// });

// Error page 404
// Route::fallback(function() {
//     return "Page not Found";
// });