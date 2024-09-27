<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        try {
            return Report::with('data', 'servant')->get();
        } catch (\Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'data_id' => 'required|integer|exists:data,id',
                'servant_id' => 'required|integer|exists:servants,id'
            ]);

            return Report::create($validated);
        } catch (\Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 500);
        }
    }
}
