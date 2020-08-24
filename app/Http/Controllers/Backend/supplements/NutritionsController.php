<?php

namespace App\Http\Controllers\Backend\supplements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\supplements\Nutritions;

class NutritionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nutritions = Nutritions::orderBy('id')->get();
        return view('backend.supplements.nutritions.index', compact('nutritions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplements.nutritions.create');
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
        if (!file_exists('uploads/supplements/nutritions')) {
            mkdir('uploads/supplements/nutritions', 0755, true);
        }
        
        $nutrition = new Nutritions;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '\uploads\supplements\nutritions\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }
        else {
            $fileName = 'default.jpg';
        }

        $nutrition->name = $request->input('name');
        $nutrition->image = $fileName;
        $nutrition->description = $request->input('description');

        $nutrition->save();

        return redirect()->route('admin.nutritions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nutrition = Nutritions::find($id);
        return view('backend.supplements.nutritions.edit', compact('nutrition'));
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
        if (!file_exists('uploads/supplements/nutritions')) {
            mkdir('uploads/supplements/nutritions', 0755, true);
        }
        
        $nutrition = Nutritions::find($id);

        if ($request->hasFile('image')) {
            // 先刪除原本的圖片
            if ($nutrition->image != 'default.jpg')
                @unlink('uploads/supplements/nutritions/' . $nutrition->image);
            $file = $request->file('image');
            $path = public_path() . '\uploads\supplements\nutritions\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $nutrition->image = $fileName;
        }

        $nutrition->name = $request->input('name');
        $nutrition->description = $request->input('description');

        $nutrition->save();

        return redirect()->route('admin.nutritions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nutrition = Nutritions::find($id);
        if ($nutrition->image != 'default.jpg')
            @unlink('uploads/supplements/nutritions/' . $nutrition->image);
        $nutrition->delete();
        return redirect()->route('admin.nutritions.index');
    }
}