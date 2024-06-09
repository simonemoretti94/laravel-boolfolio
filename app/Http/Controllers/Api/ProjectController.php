<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {

        if ($request->has('search')) {
            return response()->json([
                'success' => true,
                'results' => Project::with(['technologies'])->orderByDesc('id')->where('title', 'LIKE', '%'.$request->search)->paginate(),
            ]);
        } else {
            return response()->json([
                'success' => true,
                'results' => Project::orderByDesc('id')->paginate(5),
            ]);
        }

    }

    public function filteredIndex()
    {
        $filtered = Project::with(['tags', 'technologies', 'category'])->orderByDesc('id')->paginate();
        if ($filtered) {
            return response()->json([
                'success' => true,
                'results' => $filtered,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => '404 results not found',
            ], 404);
        }
    }

    public function show($id)
    {
        $showItem = Project::find($id);
        if ($showItem) {
            return response()->json([
                'success' => true,
                'results' => $showItem,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => '404 project not found',
            ], 404);
        }
    }
}
