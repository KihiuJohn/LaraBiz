<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return response()->json($page);
    }

    public function update(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        $data = $request->validate([
            'page_title' => 'required|string',
            'page_description' => 'required|string',
            'main_heading' => 'nullable|string',
            'main_content' => 'nullable|string',
            'hero_title' => 'nullable|string',
            'hero_subtitle' => 'nullable|string',
            'hero_image' => 'nullable|url',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        $page->update($data);

        return response()->json($page);
    }
}