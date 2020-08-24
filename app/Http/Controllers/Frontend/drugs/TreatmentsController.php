<?php

namespace App\Http\Controllers\Frontend\drugs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\drugs\Treatments;
use App\Models\Website;

class TreatmentsController extends Controller
{
    public function index ()
    {
        $treatments = Treatments::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.drugs.treatments', compact('treatments', 'website'));
    }
}