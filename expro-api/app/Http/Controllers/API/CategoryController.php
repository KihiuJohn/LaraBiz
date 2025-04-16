<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // GET: /api/categories
    public function index()
    {
        return response()->json(Category::all());
    }

    // POST: /api/categories
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|min:2',
            'slug'        => 'nullable|string|min:2|unique:categories,slug',
            'description' => 'nullable|string',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Default post_count to zero on creation.
        $data['post_count'] = 0;

        $category = Category::create($data);

        return response()->json($category, 201);
    }

    // GET: /api/categories/{id}
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // PUT: /api/categories/{id}
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'name'        => 'required|string|min:2',
            'slug'        => 'nullable|string|min:2|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category->update($data);

        return response()->json($category);
    }

    // DELETE: /api/categories/{id}
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Optional: Check if category is used by any blog posts.
        // For now, simply delete.
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
