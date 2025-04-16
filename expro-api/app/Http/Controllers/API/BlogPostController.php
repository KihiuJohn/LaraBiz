<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * GET: /api/blog-posts
     */
    public function index()
    {
        Log::debug('Fetching all blog posts');
        return response()->json(BlogPost::orderBy('publish_date', 'desc')->get(), 200);
    }

    /**
     * GET: /api/blog-posts/{id}
     */
    public function show($id)
    {
        Log::debug('Fetching blog post', ['id' => $id]);
        $post = BlogPost::findOrFail($id);
        return response()->json($post, 200);
    }

    /**
     * POST: /api/blog-posts
     */
    public function store(Request $request)
    {
        Log::info('Store method called', ['request' => $request->all()]);

        $data = $request->validate([
            'title'           => 'required|string|min:5',
            'slug'            => 'nullable|string|min:5|unique:blog_posts,slug',
            'excerpt'         => 'required|string|min:10',
            'content'         => 'required|string|min:50',
            'featured_image'  => 'nullable|url',
            'category'        => 'required|string',
            'author'          => 'required|string',
            'tags'            => 'nullable|string',
            'is_published'    => 'boolean',
            'publish_date'    => 'required|date',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $post = BlogPost::create($data);
        Log::info('Blog post created', ['post' => $post->toArray()]);

        return response()->json($post, 201);
    }

    /**
     * PUT: /api/blog-posts/{id}
     */
    public function update(Request $request, $id)
    {
        Log::info('Update method called', ['id' => $id, 'request' => $request->all()]);
        $post = BlogPost::findOrFail($id);

        $data = $request->validate([
            'title'           => 'required|string|min:5',
            'slug'            => 'nullable|string|min:5|unique:blog_posts,slug,' . $post->id,
            'excerpt'         => 'required|string|min:10',
            'content'         => 'required|string|min:50',
            'featured_image'  => 'nullable|url',
            'category'        => 'required|string',
            'author'          => 'required|string',
            'tags'            => 'nullable|string',
            'is_published'    => 'boolean',
            'publish_date'    => 'required|date',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $post->update($data);
        Log::info('Blog post updated', ['post' => $post->toArray()]);

        return response()->json($post, 200);
    }

    /**
     * DELETE: /api/blog-posts/{id}
     */
    public function destroy($id)
    {
        Log::info('Delete method called', ['id' => $id]);
        $post = BlogPost::findOrFail($id);
        $post->delete();

        Log::info('Blog post deleted', ['id' => $id]);
        return response()->json(['message' => 'Blog post deleted successfully'], 200);
    }
}