<?php

use App\Models\Comment;
use App\Models\Package;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;

it('requires authentication', function () {
    delete(route('packages.destroy', Package::factory()->create()))
        ->assertRedirect(route('login'));
});

it('can delete a package', function () {
    $package = Package::factory()->create();
    $user = User::factory()->create(['is_admin' => true]);
    actingAs($user)->delete(route('packages.destroy', $package));
    $this->assertModelMissing($package);
});

it('redirects to the packages index page', function () {
    $package = Package::factory()->create();
    $user = User::factory()->create(['is_admin' => true]);

    actingAs($user)->delete(route('packages.destroy', $package))
        ->assertRedirect(route('packages.index'));
});

// it('redirects to the post show page with the page query parameter', function () {
//     $comment = Comment::factory()->create();

//     actingAs($comment->user)
//         ->delete(route('comments.destroy', ['comment' => $comment, 'page' => 2]))
//         // ->assertRedirect(route('posts.show', ['post' => $comment->post_id, 'page' => 2]));
//         ->assertRedirect($comment->post->showRoute(['page' => 2]));
// });

// it('prevents deleting a comment you didnt create', function () {
//     $comment = Comment::factory()->create();
//     //act as new user
//     actingAs(User::factory()->create())
//         ->delete(route('comments.destroy', $comment))
//         ->assertForbidden();
// });

// // WAS NOT WORK ERROR
// it('prevents deleting a comment posted over an hour ago', function () {
//     $this->freezeTime();
//     $comment = Comment::factory()->create();

//     $this->travel(1)->hour();

//     actingAs($comment->user)
//         ->delete(route('comments.destroy', $comment))
//         ->assertForbidden();
// });