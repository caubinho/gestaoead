<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subdomain'
    ];

    public $incrementing = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
