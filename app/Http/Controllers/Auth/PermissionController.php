<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RoleOnUser;
use Exception;

class PermissionController extends Controller
{
    public function index(string $id)
    {
        try {
            return RoleOnUser::with('role')
                ->where('user_id', $id)
                ->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
