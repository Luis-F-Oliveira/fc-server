<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {
            return User::all();
        } catch (\Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(User $user)
    {
        try {
            return $user;
        } catch (\Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, User $user)
    {
        try {

        } catch (\Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(User $user)
    {
        try {

        } catch (\Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 500);
        }
    }
}
