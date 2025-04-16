<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ConsultingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConsultingServiceController extends Controller
{
    /**
     * GET /api/consulting-services
     *   - optional ?slug=some-slug
     */
    public function index(Request $request)
    {
        $query = ConsultingService::with('children')->orderBy('title', 'asc');

        // if ?slug=...
        if ($request->has('slug')) {
            $query->where('slug', $request->query('slug'));
        }

        return response()->json($query->get());
    }

    /**
     * GET /api/consulting-services/{id}
     */
    public function show($id)
    {
        $service = ConsultingService::with('children')->findOrFail($id);
        return response()->json($service);
    }

    /**
     * POST /api/consulting-services
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'parent_id'         => 'nullable|exists:consulting_services,id',
            'title'             => 'required|string|min:3',
            'slug'              => 'nullable|string|unique:consulting_services,slug',
            'category'          => 'nullable|string',
            'image'             => 'nullable|url',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $service = ConsultingService::create($data);

        return response()->json($service, 201);
    }

    /**
     * PUT /api/consulting-services/{id}
     */
    public function update(Request $request, $id)
    {
        $service = ConsultingService::findOrFail($id);

        $data = $request->validate([
            'parent_id'         => 'nullable|exists:consulting_services,id',
            'title'             => 'required|string|min:3',
            'slug'              => 'nullable|string|unique:consulting_services,slug,' . $service->id,
            'category'          => 'nullable|string',
            'image'             => 'nullable|url',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $service->update($data);

        return response()->json($service);
    }

    /**
     * DELETE /api/consulting-services/{id}
     */
    public function destroy($id)
    {
        $service = ConsultingService::findOrFail($id);
        $service->delete();

        return response()->json(['message' => 'Service deleted successfully']);
    }
}
