<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Supplement;
use App\Models\Website;

class SupplementController extends Controller
{
    public function index ()
    {
        $supplements = Supplement::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.supplement', compact('supplements', 'website'));
    }
}