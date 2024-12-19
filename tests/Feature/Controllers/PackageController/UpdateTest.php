<?php

use App\Models\Package;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\put;

it('requires authentication', function () {
    put(route('packages.update', Package::factory()->create()))
        ->assertRedirect(route('login'));
});

it('can update a package', function () {
    $user = User::factory()->create(['is_admin' => true]);
    $package = Package::factory()->create([
        'code' => "This is old code",
        'info' => 'This is the old info'
    ]);
    $newCode = 'This is the new code';
    $newInfo = 'This is the new info';

    actingAs($user)
        ->put(route('packages.update', $package), [
            'code' =>   $newCode,
            'info' => $newInfo
        ]);

    $this->assertDatabaseHas(Package::class, [
        'id' => $package->id,
        'code' =>   $newCode,
        'info' => $newInfo
    ]);
});

// it('redirects to the package show page', function () {
//     $user = User::factory()->create(['is_admin' => true]);
//     $package = Package::factory()->create();

//     actingAs($user)
//         ->put(route('Package.update', $package), [
//             'code' => "This is new code",
//             'info' => 'This is the new info'
//         ])
//         ->assertRedirect($package->showRoute());
// });
