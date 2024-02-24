<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpadteUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return  UserResource::collection($users);
    }

    public function store(StoreUpadteUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);


        $user = User::create($data);

        return new UserResource($user);
    }


    public function findUserById(string $id)
    {
        // $user = User::find($id);
        // $user = User::where('id', '=', $id)->first();

        // if (!$user) {
        //     return response()->json([
        //         'message' => 'User not found'
        //     ], 404);
        // }
        
        $user = User::findOrFail($id);
        
        
        return new UserResource($user);
    }
}
