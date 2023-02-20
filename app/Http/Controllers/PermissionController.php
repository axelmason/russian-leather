<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function get()
    {
        return response()->json(['permissions' => Permission::all()]);
    }
}
