<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\TopicResource;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Topic $topic = null)
    {
        $posts = Post::with(['user', 'topic'])
            ->when($topic, fn(Builder $query) => $query->whereBelongsTo($topic))

            ->when(
                $request->query('query'),
                fn(Builder $query) => $query->whereAny(['title', 'body'], 'like', '%' . $request->query('query') . '%')
            )
            ->latest()
            ->latest('id')
            ->paginate();

        $recentPosts = Post::latest()
            ->take(2)
            ->get();

        return inertia('Posts/Index', [
            'posts' => PostResource::collection($posts),
            'recentPosts' => PostResource::collection($recentPosts),
            'topics' => fn() => TopicResource::collection(Topic::all()),
            'selectedTopic' => fn() => $topic ? TopicResource::make($topic) : null,
            'query' => $request->query('query'),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Post::class);
        return inertia('Posts/Create', [
            'topics' => fn() => TopicResource::collection(Topic::all()),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data =  $request->validate([
            'title' => 'required|string|min:10|max:255',
            'topic_id' => 'required|exists:topics,id',
            'body' => 'required|min:100|max:10000|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create([
            ...$data,
            'image' => $imagePath,
            'user_id' => $request->user()->id,
        ]);
        // use slug 
        return redirect()->route('posts.index')
            ->banner('Post created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, Post $post)
    {
        //use request to update slug url 
        if (!Str::endsWith($post->showRoute(), $request->path())) {

            return redirect($post->showRoute($request->query()), status: 301); //give page of any other pram
        }

        $post->load('user', 'topic');

        $recentPosts = Post::latest()
            ->take(2)
            ->get();

        return inertia('Posts/Show', [

            'post' => fn() => PostResource::make($post)->withLikePermission(),
            'post' => fn() => PostResource::make($post)->withLikePermission(),
            'recentPosts' => PostResource::collection($recentPosts),
            'comments' => function () use ($post) {
                $commentResource = CommentResource::collection($post->comments()->with('user')->latest()->latest('id')->paginate(10));
                $commentResource->collection->transform(fn($resource) => $resource->withLikePermission());
                return $commentResource;
            },
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return inertia('Posts/Edit', [
            'post' => $post,
            'topics' => fn() => TopicResource::collection(Topic::all()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'topic_id' => 'required|exists:topics,id',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if a new one is uploaded
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        // Update the post with the new data
        $post->update($data);

        // Use slug
        return redirect($post->showRoute(['page' => $request->query('page')]))
            ->banner('Post updated.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        if ($request->user()->id !== $post->user_id) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->banner('Post deleted successfully.');
    }
}
