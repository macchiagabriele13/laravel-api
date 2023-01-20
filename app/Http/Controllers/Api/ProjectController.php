<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Project::with(['technologies', 'type'])->orderByDesc('id')->paginate(5)
        ]);

        //return Post::orderByDesc('id')->paginate(5);
    }

    public function show($slug)
    {
        $project = Project::with('technologies', 'type')->where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null,
            ]);
        }
    }
}
