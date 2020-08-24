<?php

namespace App\Http\Controllers\Backend\drugs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\drugs\DrugIntroduction;

class DrugIntroductionController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drug_introduction = DrugIntroduction::orderBy('id')->get();
        return view('backend.drugs.drug_introduction.index', compact('drug_introduction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.drugs.drug_introduction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 如果路徑不存在，就自動建立
        if (!file_exists('uploads/drugs/drug_introduction')) {
            mkdir('uploads/drugs/drug_introduction', 0755, true);
        }
        
        $drug = new DrugIntroduction;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '\uploads\drugs\drug_introduction\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }
        else {
            $fileName = 'default.jpg';
        }

        $drug->name = $request->input('name');
        $drug->generic_name = $request->input('generic_name');
        $drug->image = $fileName;
        $drug->uses = $request->input('uses');
        $drug->description = $request->input('description');

        $drug->save();

        return redirect()->route('admin.drug_introduction.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drug = DrugIntroduction::find($id);
        return view('backend.drugs.drug_introduction.edit', compact('drug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 如果路徑不存在，就自動建立
        if (!file_exists('uploads/drugs/drug_introduction')) {
            mkdir('uploads/drugs/drug_introduction', 0755, true);
        }
        
        $drug = DrugIntroduction::find($id);

        if ($request->hasFile('image')) {
            // 先刪除原本的圖片
            if ($drug->image != 'default.jpg')
                @unlink('uploads/drugs/drug_introduction/' . $drug->image);
            $file = $request->file('image');
            $path = public_path() . '\uploads\drugs\drug_introduction\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $drug->image = $fileName;
        }

        $drug->name = $request->input('name');
        $drug->generic_name = $request->input('generic_name');
        $drug->uses = $request->input('uses');
        $drug->description = $request->input('description');

        $drug->save();

        return redirect()->route('admin.drug_introduction.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $drug = DrugIntroduction::find($id);
        if ($drug->image != 'default.jpg')
            @unlink('uploads/drugs/drug_introduction/' . $drug->image);
        $drug->delete();
        return redirect()->route('admin.drug_introduction.index');
    }

}
