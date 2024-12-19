<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
// use App\Http\Resources\PackageResource;
use App\Http\Resources\ServiceResource;
// use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             $services = ServiceResource::collection(Service::latest()->latest('id')->paginate());
       // $services = ServiceResource::collection(Service::with('packages')->latest()->paginate());

        return inertia('Services/Index', [
            'services' => $services,
         //   'packageItems' => PackageResource::collection(Package::all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Service $service)
    {
        Gate::authorize('create', Service::class);
        $data = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:50'],
            'description' => ['required', 'string', 'min:5', 'max:10000'],
        ]);

        $service = Service::create($data);

        // return redirect($service->showRoute());
        return redirect(route('services.index'))
            ->banner('Service created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Service $service)
    {
        if (!Str::endsWith($service->showRoute(), $request->path())) {

            return redirect($service->showRoute($request->query()), status: 301); //301 permanent redirect to correct route
        }

      //  $service->load('packages');

        return inertia('Services/Show', [
            'service' => ServiceResource::make($service),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        Gate::authorize('delete', $service);

        $service->delete();
        return redirect(route('services.index'))
            ->banner('Service deleted.');
    }
}
