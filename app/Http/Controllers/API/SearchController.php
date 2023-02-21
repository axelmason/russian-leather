<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $r)
    {
        $query = $r->get('query');
        if(!empty($query)) {
            $result = Product::query()
                ->where('title', 'LIKE', "%$query%")
                ->limit(7)
                ->get();

            return response()->json(['result' => $result]);
        }

        return response()->json('', 204);
    }
}
