<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, ImageTrait;

    protected $fillable = [
        'name',
        'description',
        'image',
        'available'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'string',
    ];

    public $incrementing = false;

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

}
