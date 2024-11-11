<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleOnUserRequest;
use App\Models\RoleOnUser;
use Exception;

class RoleOnUserController extends Controller
{
    public function index()
    {
        try {
            return RoleOnUser::with('user', 'role')->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(RoleOnUserRequest $request)
    {
        try {
            if (RoleOnUser::firstOrCreate($request->all())) {
                return response()->json([
                   'message' => 'Relacionamento de usuário e cargo criado'
                ], 201);
            }

            return response()->json([
                'message' => 'Relacionamento de usuário e cargo já existente'
            ], 409);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(RoleOnUser $roleOnUser)
    {
        try {
            return $roleOnUser;
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $roleOnUser = RoleOnUser::find($id);
            $roleOnUser->delete();

            return response()->json([
               'message' => 'Relacionamento de usuário e cargo excluído'
            ], 204);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
