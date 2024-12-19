<?php

use App\Http\Resources\PackageResource;
use App\Models\Package;

use function Pest\Laravel\get;

it('can show a package', function () {
    $package = Package::factory()->create();
    get($package->showRoute())
        ->assertComponent('Packages/Show');
});

it('passes a package to the view', function () {
    $package = Package::factory()->create();
    get($package->showRoute())
        ->assertHasResource('packageItem', PackageResource::make($package));
});
