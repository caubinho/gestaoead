<?php

namespace App\Models\Traits;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    protected function image(): Attribute
    {

        return Attribute::make(


            get:fn ($value) => $value ? Storage::url($value) : null,
        );
    }
}
