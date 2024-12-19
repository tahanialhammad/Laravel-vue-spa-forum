<?php

use App\Models\Package;
use App\Models\User;
use function Pest\Laravel\post;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->validData = fn () => [
        'code' => 'laravel',
        'info' => 'Ullamco Lorem consequat sunt elit laboris adipisici dolor. Mollit minim sunt mollit ullamco non ex dolore incididunt ullamco occaecat sunt id excepteur. Deserunt aliquip eu laborum cillum nostrud sint dolor reprehenderit minim adipisicing. Enim sit amet et.',
    ];
});

it('requires authentication', function () {
    post(route('packages.store'))->assertRedirect(route('login'));
});

it('store a package', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $data = value($this->validData);

    actingAs($user)->post(route('packages.store'), $data);

    $this->assertDatabaseHas(Package::class, [
        ...$data,
    ]);
});

it('redirects to the packages index page', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $data = value($this->validData);

    actingAs($user)->post(route('packages.store', $data))
        ->assertRedirect(route('packages.index'));
});
