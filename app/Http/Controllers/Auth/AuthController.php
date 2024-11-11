<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\EntryCode;
use App\Http\Controllers\Controller;
use App\Models\RoleOnUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    protected $entryCode;

    public function __construct(EntryCode $entryCode)
    {
        $this->entryCode = $entryCode;
    }

    public function index(Request $request)
    {
        try { 
            $validated = $request->validate([
                'entry_code' => 'required|string|min:6|max:6' 
            ]);

            $user = User::where('entry_code', $validated['entry_code'])->first();

            if (!$user) {
                throw new Exception('Código de acesso inválido!');
            }

            $roles = RoleOnUser::with('role')
                ->where('user_id', $user->id)
                ->get();

            $roleNames = $roles->pluck('role.name')->toArray();

            $token = $user->createToken('auth-token', $roleNames)->plainTextToken;
            $cookie = cookie('jwt', $token);

            return response()->json([
                'token' => $token,
                'roles' => $roleNames,
            ], 200)->withCookie($cookie);
        } catch (Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255|unique:users,email'
            ]);

            $entryCode = $this->entryCode->generateEntryCode();

            return User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'entry_code' => $entryCode
            ]);
        } catch (Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            $cookie = Cookie::forget('jwt');
    
            return response()->json([
                'message' => 'Logout realizado com sucesso'
            ], 200)->withCookie($cookie);
    
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Falha ao realizar logout',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
