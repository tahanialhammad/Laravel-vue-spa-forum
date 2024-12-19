<?php

use App\Models\Comment;

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

it('requires authentication', function () {
    // check auth user , we a comment to delete it , and not nessesry to add parent route post.comm...
    delete(route('comments.destroy', Comment::factory()->create()))
        ->assertRedirect(route('login'));
});

it('can delete a comment', function () {
    $comment = Comment::factory()->create();
    //login
    actingAs($comment->user)->delete(route('comments.destroy', $comment));

    $this->assertModelMissing($comment);
});

it('redirects to the post show page', function () {
    $comment = Comment::factory()->create();
    //comment must be crreated by this user
    actingAs($comment->user)
        ->delete(route('comments.destroy', $comment))
        //  ->assertRedirect(route('posts.show', $comment->post_id));
        ->assertRedirect($comment->post->showRoute()); // with slug
});

it('redirects to the post show page with the page query parameter', function () {
    $comment = Comment::factory()->create();

    actingAs($comment->user)
        ->delete(route('comments.destroy', ['comment' => $comment, 'page' => 2]))
        // ->assertRedirect(route('posts.show', ['post' => $comment->post_id, 'page' => 2]));
        ->assertRedirect($comment->post->showRoute(['page' => 2]));
});

it('prevents deleting a comment you didnt create', function () {
    $comment = Comment::factory()->create();
    //act as new user
    actingAs(User::factory()->create())
        ->delete(route('comments.destroy', $comment))
        ->assertForbidden();
});

// WAS NOT WORK ERROR
it('prevents deleting a comment posted over an hour ago', function () {
    $this->freezeTime();
    $comment = Comment::factory()->create();

    $this->travel(1)->hour();

    actingAs($comment->user)
        ->delete(route('comments.destroy', $comment))
        ->assertForbidden();
});