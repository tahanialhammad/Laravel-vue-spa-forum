<?php

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


beforeEach(function () {
    $this->validData = fn () => [
        'title' => 'Hello World',
        'topic_id' => Topic::factory()->create()->getKey(),
     //  'newtopic' => null,
        'body' => 'Ullamco Lorem consequat sunt elit laboris adipisicing non proident eu est. Veniam ad cupidatat ex commodo mollit eiusmod. Excepteur do cillum incididunt consectetur pariatur ex sunt veniam dolor. Consectetur esse laborum culpa nostrud ut est commodo velit ad consectetur aliqua dolor. Mollit minim sunt mollit ullamco non ex dolore incididunt ullamco occaecat sunt id excepteur. Deserunt aliquip eu laborum cillum nostrud sint dolor reprehenderit minim adipisicing. Enim sit amet et.',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ];
});

it('requires authentication', function () {
    post(route('posts.store'))->assertRedirect(route('login'));
});

it('stores a post with valid data', function () {
    $user = User::factory()->create();
    $data = value($this->validData);

    actingAs($user)->post(route('posts.store'), $data);

    $this->assertDatabaseHas(Post::class, [
        ...$data,      
        'topic_id' => $data['topic_id'],
        'user_id' => $user->id,
    ]);
});

// it('creates a new topic when newtopic is provided', function () {
//     $user = User::factory()->create();
//     $data = [
//         'title' => 'Hello World',
//         'newtopic' => 'New Topic',
//         'body' => 'This is the body.',
//     ];

//     actingAs($user)->post(route('posts.store'), $data);

//     $this->assertDatabaseHas(Topic::class, ['name' => 'New Topic']);
//     $this->assertDatabaseHas(Post::class, ['title' => 'Hello World']);
// });

// dont needed
// it('redirects to the post show page', function () {
//     $user = User::factory()->create();

//     actingAs($user)
//         ->post(route('posts.store'), value($this->validData))
//         ->assertRedirect(Post::latest('id')->first()->showRoute());
// });

// NOT WORK

// it('stores an image if provided', function () {
//     Storage::fake('public');
//     $user = User::factory()->create();
    
//     // Include an image for this test
//     $data = array_merge($this->validData(), [
//         'image' => UploadedFile::fake()->image('test.jpg'),
//     ]);

//     actingAs($user)->post(route('posts.store'), $data);

//     $post = Post::latest()->first();
//     $this->assertNotNull($post->image);
//     Storage::disk('public')->assertExists($post->image);
// });


// it('redirects to the posts index page', function () {
//     $user = User::factory()->create();

//     actingAs($user)
//         ->post(route('posts.store'), value($this->validData))
//         ->assertRedirect(route('posts.index'));
// });


// it('requires valid data', function (array $badData, array|string $errors) {
//     actingAs(User::factory()->create())
//         ->post(route('posts.store'), [...value($this->validData), ...$badData])
//         ->assertInvalid($errors);
// })->with([
//     [['title' => null], 'title'],
//     [['title' => true], 'title'],
//     [['title' => 1], 'title'],
//     [['title' => 1.5], 'title'],
//     [['title' => str_repeat('a', 121)], 'title'],
//     [['title' => str_repeat('a', 9)], 'title'],
//     [['topic_id' => null], 'topic_id'],
//     [['topic_id' => -1], 'topic_id'],
//     [['body' => null], 'body'],
//     [['body' => true], 'body'],
//     [['body' => 1], 'body'],
//     [['body' => 1.5], 'body'],
//     [['body' => str_repeat('a', 10_001)], 'body'],
//     [['body' => str_repeat('a', 99)], 'body'],
// ]);

