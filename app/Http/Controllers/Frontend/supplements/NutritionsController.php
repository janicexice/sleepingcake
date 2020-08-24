<?php

namespace App\Http\Controllers\Frontend\supplements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\supplements\Nutritions;
use App\Models\Website;

class NutritionsController extends Controller
{
    public function index ()
    {
        $nutritions = Nutritions::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.supplements.nutritions', compact('nutritions', 'website'));
    }
}