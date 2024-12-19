<?php

namespace App\Models;

use App\Models\Concerns\ConvertsMarkdownToHtml;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    use ConvertsMarkdownToHtml;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }
    public function title(): Attribute
    {
        return Attribute::set(fn ($value) => Str::title($value));
    }

    //body and html, but its not best practice becouse we wil call this with every single edit on the post, so we go to use listener to event on the model
    // public function body(): Attribute
    // {
    //     return Attribute::set(fn ($value) => [
    //         'body'=> $value,
    //         'html' => str($value)->markdown()
    //         ]
    //     );
    // }
    //to make slug url ,in array so we can add more pram ex page ....
    // add it to post resource

    public function showRoute(array $parameters = [])
    {
        return route('posts.show', [$this, Str::slug($this->title), ...$parameters]);
    }
}
