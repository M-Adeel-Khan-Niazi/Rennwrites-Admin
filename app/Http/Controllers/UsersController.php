<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function __construct(private UserService $userService) {}

    public function index(Request $request)
    {
        if ($request->has('q')) {
            $users = $this->userService->all($request->q);
            return view('users.index', compact('users'));
        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $this->userService->create($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return response()->json([
            'data' => $user
        ]);
    }

    public function update(User $user, Request $request)
    {
        $attributes = $request->only([
            'username',
            'email'
        ]);

        return response()->json([
            'data' => $this->userService->update($attributes, $user)
        ]);
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
