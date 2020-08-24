<?php

namespace App\Http\Controllers\Frontend\health;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\health\Hobbies;
use App\Models\Website;

class HobbiesController extends Controller
{
    public function index ()
    {
        $hobbies = Hobbies::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.health.hobbies', compact('hobbies', 'website'));
    }
}