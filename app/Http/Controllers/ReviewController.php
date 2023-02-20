<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $r)
    {
        $userId = auth()->user()->id;

        Review::create([
            'user_id' => $userId,
            'message' => $r->message
        ]);

        return back()->with('success', 'Сообщение успешно отправлено');
    }

    public function get()
    {
        $reviews = Review::orderBy('read')->with('user')->get();
        return response()->json(['reviews' => $reviews]);
    }
}
