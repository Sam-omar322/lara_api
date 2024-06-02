<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Lesson;
use App\Models\Tag;
use App\Models\User;

class RelationshipController extends Controller
{
    public function userLessons($id) {
        $user_lessons = User::findOrFail($id)->lessons;
        return Response::json([
            "data" => $user_lessons->toArray(),
        ], 200);
    }

    public function lessonTags($id) {
        $lesson_tags = Lesson::findOrFail($id)->tags;
        return Response::json([
            "data" => $lesson_tags->toArray(),
        ], 200);
    }

    public function tagLessons($id) {
        $tag_lessons = Tag::findOrFail($id)->lessons;
        return Response::json([
            "data" => $tag_lessons->toArray(),
        ], 200);
    }
}
