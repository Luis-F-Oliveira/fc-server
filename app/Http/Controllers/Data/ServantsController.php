<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Servants;
use App\Http\Requests\ServantRequest;
use App\Imports\ServantsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ServantsController extends Controller
{
    public function index()
    {
        try {
            return Servants::all();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(ServantRequest $request)
    {
        try {
            if (Servants::firstOrCreate($request->all())) {
                return response()->json([
                    'message' => 'Servidor/Defensor criado'
                ], 200);
            }

            return response()->json([
                'message' => 'Servidor/Defensor já existente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            return Servants::find($id);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function update(ServantRequest $request, string $id)
    {
        try {
            $servants = Servants::find($id);
            $servants->update($request->all());

            return response()->json([
                'message' => 'Servidor/Defensor atualizado'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $servants = Servants::findOrFail($id);
            $servants->delete();

            return response()->json([
                'message' => 'Servidor/Defensor excluído'
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Servidor/Defensor não encontrado'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file');

            Excel::import(new ServantsImport, $file);

            return response()->json([
                'message' => 'Dados importados'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function export()
    {
        try {
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
