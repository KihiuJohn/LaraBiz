<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * GET /api/programs
     *
     * Optional query params:
     *   - ?category=Something
     *   - ?slug=some-slug
     *
     * Also filter out is_deleted items by default.
     */
    public function index(Request $request)
    {
        $query = Program::with('children')
            ->where('is_deleted', false)
            ->orderBy('title', 'asc');

        // If ?category=...
        if ($request->filled('category')) {
            $query->where('category', $request->query('category'));
        }

        // If ?slug=...
        if ($request->filled('slug')) {
            $query->where('slug', $request->query('slug'));
        }

        return response()->json($query->get());
    }

    /**
     * GET /api/programs/{id}
     * - fetch by numeric ID only
     * - If you want to skip is_deleted here, do so or findOneOrFail
     */
    public function show($id)
    {
        $program = Program::with('children')->findOrFail($id);
        if ($program->is_deleted) {
            return response()->json(['message' => 'Program not found'], 404);
        }

        return response()->json($program);
    }

    /**
     * POST /api/programs
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'parent_id'         => 'nullable|exists:programs,id',
            'title'             => 'required|string|min:3',
            'slug'              => 'nullable|string|unique:programs,slug',
            'category'          => 'nullable|string',
            'image'             => 'nullable|url',
            'location'          => 'nullable|string',
            'trainer'           => 'nullable|string',
            'duration'          => 'nullable|string',
            'price'             => 'nullable|string',
            'start_date'        => 'nullable|date',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
            'key_topics'        => 'nullable|array',
            'learning_outcomes' => 'nullable|array',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // default is_deleted = false
        $data['is_deleted'] = false;

        $program = Program::create($data);

        return response()->json($program, 201);
    }

    /**
     * PUT /api/programs/{id}
     */
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);
        // If you want to ensure it's not is_deleted, do something like:
        if ($program->is_deleted) {
            return response()->json(['message' => 'Cannot edit a deleted program'], 400);
        }

        $data = $request->validate([
            'parent_id'         => 'nullable|exists:programs,id',
            'title'             => 'required|string|min:3',
            'slug'              => 'nullable|string|unique:programs,slug,' . $program->id,
            'category'          => 'nullable|string',
            'image'             => 'nullable|url',
            'location'          => 'nullable|string',
            'trainer'           => 'nullable|string',
            'duration'          => 'nullable|string',
            'price'             => 'nullable|string',
            'start_date'        => 'nullable|date',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
            'key_topics'        => 'nullable|array',
            'learning_outcomes' => 'nullable|array',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $program->update($data);

        return response()->json($program);
    }

    /**
     * DELETE /api/programs/{id}
     * Soft-delete => set is_deleted = true
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->update(['is_deleted' => true]);

        return response()->json(['message' => 'Program soft-deleted']);
    }
}
