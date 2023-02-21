<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    const ADMIN = 'admin';
    const GUEST = 'guest';
    const INDIVIDUAL = 'individual';
    const ENTITY = 'entity';
    const MAIN_EDITOR = 'main_editor';
    const MANAGER = 'manager';

    const ROLES = [
        self::ADMIN, self::GUEST, self::INDIVIDUAL, self::ENTITY, self::MAIN_EDITOR, self::MANAGER
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
