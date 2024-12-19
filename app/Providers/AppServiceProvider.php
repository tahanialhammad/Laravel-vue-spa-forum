<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // was { "data": { "id": 1,}}, now without word data
        JsonResource::withoutWrapping();

        //to make it faster, to prevent that an nessay data loding , by showing een error message Attempted to lazy load [user] on .... , so we can fix resourse by whenLoaded 
        Model::preventLazyLoading();

        //turn off mass assignment o
        Model::unguard();

        //morphMany , custome value for morphy type

        Relation::enforceMorphMap([
            'post' => Post::class,
            'comment' => Comment::class,
            'user' => User::class,
        ]);
    }
}
