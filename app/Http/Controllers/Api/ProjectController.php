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
}
