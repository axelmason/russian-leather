<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $primaryKey = 'name';
    protected $keyType = 'string';

    protected $fillable = ['name', 'value'];

    protected $casts = [
        'value' => 'array'
    ];
}
