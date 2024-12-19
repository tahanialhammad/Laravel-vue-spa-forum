<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Service extends Model
{
    use HasFactory;
    // public function packages()
    // {
    //     return $this->belongsToMany(Package::class, 'service_package', 'service_id', 'package_id');
    // }

    public function showRoute(array $parameters = [])
    {
        return route('services.show', [$this, Str::slug($this->title), ...$parameters]);
    }
}
