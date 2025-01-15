<?php

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

beforeEach(function () {
    // Prepare valid data for the tests
    $this->validData = [
        'title' => 'Hello World',
        'topic_id' => Topic::factory()->create()->getKey(),
        //'body' => 'Ullamco Lorem consequat sunt elit laboris adipisicing non proident eu est, veniam ad ex mollit.', //100 char
        'body' => str_repeat('a', 100),
        'image' => UploadedFile::fake()->image('test.jpg'),
    ];
});

it('requires authentication', function () {
    // Ensure unauthenticated users are redirected to the login page
    post(route('posts.store'))->assertRedirect(route('login'));
});

it('stores a post with valid data', function () {
    // Create a user and authenticate
    $user = User::factory()->create();
    $data = $this->validData;

    // Post valid data and assert redirection to the post index
    actingAs($user)->post(route('posts.store'), $data)
        ->assertRedirect(route('posts.index'));

    // Assert the post exists in the database
    $this->assertDatabaseHas('posts', [
        'title' => $data['title'],
        'body' => $data['body'],
    ]);
});

it('requires valid data', function (array $badData, array|string $errors) {
    actingAs(User::factory()->create())
        ->post(route('posts.store'), [...value($this->validData), ...$badData])
        ->assertInvalid($errors);
})->with([
    [['title' => null], 'title'],
    [['title' => true], 'title'],
    [['title' => 1], 'title'],
    [['title' => 1.5], 'title'],
    [['title' => str_repeat('a', 300)], 'title'], // Title too long
    [['title' => str_repeat('a', 9)], 'title'], // Title too short
    [['topic_id' => null], 'topic_id'],  // Missing topic ID
    [['topic_id' => -1], 'topic_id'], // Invalid topic ID
    [['body' => null], 'body'],  // Missing body
    [['body' => true], 'body'],
    [['body' => 1], 'body'],
    [['body' => 1.5], 'body'],
    [['body' => str_repeat('a', 10_001)], 'body'], // Body too long
    [['body' => str_repeat('a', 99)], 'body'], // Body too short
    [['image' => 'not-an-image'], 'image'],   // Invalid image
]);
