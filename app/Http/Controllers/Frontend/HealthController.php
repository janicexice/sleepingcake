<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Health;
use App\Models\Website;

class HealthController extends Controller
{
    public function index ()
    {
        $health = Health::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.health', compact('health', 'website'));
    }
}