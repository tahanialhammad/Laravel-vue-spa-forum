<?php

use App\Http\Resources\ServiceResource;
use App\Models\Service;

use function Pest\Laravel\get;

it('can show a service', function () {
    $service = Service::factory()->create();

    // get(route('services.show', $service))
    //     ->assertComponent('Services/Show');

    get($service->showRoute())
        ->assertComponent('Services/Show');
});

it('passes a service to the view', function () {
    $service = Service::factory()->create();

    $service->load('packages');

    // get(route('services.show', $service))
    //     ->assertHasResource('service', ServiceResource::make($service));
    // with slug
    get($service->showRoute())
        ->assertHasResource('service', ServiceResource::make($service));
});
