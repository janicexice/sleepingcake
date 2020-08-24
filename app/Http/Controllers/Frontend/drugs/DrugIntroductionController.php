<?php

namespace App\Http\Controllers\Frontend\drugs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\drugs\DrugIntroduction;
use App\Models\Website;

class DrugIntroductionController extends Controller
{
    public function index ()
    {
        $drug_introduction = DrugIntroduction::orderBy('id')->get();
        $website = Website::find(1);
        return view('frontend.drugs.drug_introduction', compact('drug_introduction', 'website'));
    }
}