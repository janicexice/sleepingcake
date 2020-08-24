<?php

namespace App\Http\Controllers\Frontend\health;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\health\Diet;
use App\Models\Website;

class DietController extends Controller
{
    public function index ()
    {
        $diet = Diet::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.health.diet', compact('diet', 'website'));
    }
}