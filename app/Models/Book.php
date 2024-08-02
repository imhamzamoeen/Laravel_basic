<?php

namespace App\Models;

use App\Casts\stringUpperCase;
use App\Enum\statusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'is_active',
        'json',
    ];

    protected $casts=[
        'json'=> AsArrayObject::class,
        'title'=>stringUpperCase::class,
        'description'=>statusEnum::class,
    ];
}
