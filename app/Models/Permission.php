<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    const FULL_ACCESS = 'full_access';
    const GET_RELATED = 'get_related';
    const GET_INFO = 'get_info';
    const REVIEWS = 'reviews';
    const PERSONAL_WORK = 'personal_work';
    const FORM_CONTRACT = 'form_contract';
    const EDIT_CONTENT = 'edit_content';
    const ORDER_MANAGEMENT = 'order_management';

    const PERMISSIONS = [
        self::FULL_ACCESS,
        self::GET_RELATED,
        self::GET_INFO,
        self::REVIEWS,
        self::PERSONAL_WORK,
        self::FORM_CONTRACT,
        self::EDIT_CONTENT,
        self::ORDER_MANAGEMENT
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
