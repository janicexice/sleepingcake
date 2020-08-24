<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Models\Website;

class DrugController extends Controller
{
    public function index ()
    {
        $drugs = Drug::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.drug', compact('drugs', 'website'));
    }
}