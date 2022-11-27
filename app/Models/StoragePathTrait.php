<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait StoragePathTrait {
  /**
     * Get the public path for tp file url.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 'storage/'.$value,
        );
    }
}