<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Resources\User as UserResources;

class UserController extends Controller
{

    public function __construct() {
        $this->middleware("auth:sanctum"); // ->except(['index', 'show'])
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UserResources::collection(User::all());
        return $users->response()->setStatusCode(200, "User Returned Successfuly");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new UserResources(User::create($request->all()));
        return $user->response()->setStatusCode(200, "User Returned Successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = new UserResources(User::findOrFail($id));
        return $user->response()->setStatusCode(200, "User Returned Successfuly");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = new UserResources(User::findOrFail($id));
        $user->update($request->all());
        return $user->response()->setStatusCode(200, "User Returned Successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return Response::json([
            "message" => "Deleted Success!",
        ]);
    }
}
