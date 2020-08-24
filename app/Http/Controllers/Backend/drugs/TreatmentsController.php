<?php

namespace App\Http\Controllers\Backend\drugs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\drugs\Treatments;

class TreatmentsController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $treatments = Treatments::orderBy('id')->get();
        return view('backend.drugs.treatments.index', compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.drugs.treatments.create');
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
        if (!file_exists('uploads/drugs/treatments')) {
            mkdir('uploads/drugs/treatments', 0755, true);
        }
        
        $treatment = new Treatments;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '\uploads\drugs\treatments\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }
        else {
            $fileName = 'default.jpg';
        }

        $treatment->title = $request->input('title');
        $treatment->image = $fileName;
        $treatment->description = $request->input('description');

        $treatment->save();

        return redirect()->route('admin.treatments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $treatment = Treatments::find($id);
        return view('backend.drugs.treatments.edit', compact('treatment'));
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
        if (!file_exists('uploads/drugs/treatments')) {
            mkdir('uploads/drugs/treatments', 0755, true);
        }
        
        $treatment = Treatments::find($id);

        if ($request->hasFile('image')) {
            // 先刪除原本的圖片
            if ($treatment->image != 'default.jpg')
                @unlink('uploads/drugs/treatments/' . $treatment->image);
            $file = $request->file('image');
            $path = public_path() . '\uploads\drugs\treatments\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $treatment->image = $fileName;
        }

        $treatment->name = $request->input('title');
        $treatment->description = $request->input('description');

        $treatment->save();

        return redirect()->route('admin.treatments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treatment = Treatments::find($id);
        if ($treatment->image != 'default.jpg')
            @unlink('uploads/drugs/treatments/' . $treatments->image);
        $treatment->delete();
        return redirect()->route('admin.treatments.index');
    }

}
