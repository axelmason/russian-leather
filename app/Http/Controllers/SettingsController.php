<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function get()
    {
        return response()->json(['settings' => json_decode(Settings::all())]);
    }

    public function save(Request $r)
    {
        foreach ($r->all() as $field) {
            $setting = Settings::find($field['name']);
            $setting->value = $field['value'];
            $setting->save();
        }

        return response()->json(['success' => true]);
    }
}
