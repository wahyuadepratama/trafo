<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
      $projects = Project::all();
      return $projects;
    }

    public function create(Request $request)
    {
      Project::create([
        'name' => $request->name,
        'reference_number' => $request->reference_number,
        'ulp' => $request->ulp
      ]);

      return response()->json([
        'success' => true,
        'message' => 'Berhasil menambah data'
      ]);
    }

    public function delete(Request $request)
    {
      Project::where('id', $request->id)->delete();
      return response()->json([
        'success' => true,
        'message' => 'Berhasil menghapus data'
      ]);
    }
}
