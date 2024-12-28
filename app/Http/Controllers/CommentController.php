<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post) // nessted resource controller with post 
    {
        $data = $request->validate(['body' => ['required', 'string', 'max:2500']]);

        Comment::create([
            ...$data,
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
        ]);

        //Redriect with slug
        return redirect($post->showRoute())
            ->banner('Comment added.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //authorize in resource & policy
        Gate::authorize('update', $comment);

        $data = $request->validate(
            ['body' => ['required', 'string', 'max:2500']]
        );

        $comment->update($data);
        return redirect($comment->post->showRoute(['page' => $request->query('page')]))
            ->banner('Comment updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Comment $comment)
    {
        if ($request->user()->id !== $comment->user_id) {
            abort(403);
        }
        // use policy
        Gate::authorize('delete', $comment);

        $comment->delete();
        //Redirect with slug
        return redirect($comment->post->showRoute(['page' => $request->query('page')]))
            ->banner('Comment deleted.');
    }
}
