<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Exception;

class RoleController extends Controller
{
    public function index()
    {
        try {
            return Role::all();
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function store(RoleRequest $request)
    {
        try {
            return Role::create($request->all());
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Role $role)
    {
        try {
            return $role;
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(RoleRequest $request, Role $role)
    {
        try {
            $role->update($request->all());

            return response()->json([
                'message' => 'Cargo atualizado!'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();

            return response()->json([
                'message' => 'Cargo deletado!'
            ], 204);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
