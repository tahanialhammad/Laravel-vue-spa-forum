<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;

class SiteController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'topic'])
            ->latest()
            ->take(3)
            ->get();
            
        return inertia('Home/Welcome', [
            'posts' => PostResource::collection($posts),
        ]);
    }
    public function contact()
    {
        return inertia('Contact/Index');
    }
}
