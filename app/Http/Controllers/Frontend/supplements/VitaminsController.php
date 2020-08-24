<?php

namespace App\Http\Controllers\Frontend\supplements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\supplements\Vitamins;
use App\Models\Website;

class VitaminsController extends Controller
{
    public function index ()
    {
        $vitamins = Vitamins::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.supplements.vitamins', compact('vitamins', 'website'));
    }
}