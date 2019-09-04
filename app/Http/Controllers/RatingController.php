<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;

class RatingController extends Controller
{
    public function store($productId, Request $request)
    {
        $rating = new Rating();
        $rating->product_id = $productId;
        $rating->rate_by = $request->rate_by;
        $rating->rating = $request->rating;
        $rating->comment = $request->comment;

        if ($rating->save()) {
            return redirect('/product/'.\App\Product::where('id', $productId)->first()->slug);            
        }
    }
}
