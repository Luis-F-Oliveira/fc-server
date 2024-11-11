<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        try {
            return Data::with('servant')->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            foreach ($request->all() as $order) {
                foreach ($order['servants'] as $servant) {
                    Data::firstOrCreate([
                        'order' => $order['order'],
                        'url' => $order['url'],
                        'servant_id' => $servant['id']
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $ids)
    {
        try {
            $idArray = explode(',', $ids);

            return Data::whereIn('id', $idArray)
                ->with('servant')
                ->get();
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
