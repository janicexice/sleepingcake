<?php

namespace App\Http\Controllers\Backend\health;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\health\Diet;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diet = Diet::orderBy('id')->get();
        return view('backend.health.diet.index', compact('diet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.health.diet.create');
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
        if (!file_exists('uploads/health/diet')) {
            mkdir('uploads/health/diet', 0755, true);
        }
        
        $way = new Diet;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '\uploads\health\diet\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }
        else {
            $fileName = 'default.jpg';
        }

        $way->title = $request->input('title');
        $way->image = $fileName;
        $way->description = $request->input('description');

        $way->save();

        return redirect()->route('admin.diet.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $way = Diet::find($id);
        return view('backend.health.diet.edit', compact('way'));
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
        if (!file_exists('uploads/health/diet')) {
            mkdir('uploads/health/diet', 0755, true);
        }
        
        $way = Diet::find($id);

        if ($request->hasFile('image')) {
            // 先刪除原本的圖片
            if ($way->image != 'default.jpg')
                @unlink('uploads/health/diet/' . $way->image);
            $file = $request->file('image');
            $path = public_path() . '\uploads\health\diet\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $way->image = $fileName;
        }

        $way->title = $request->input('title');
        $way->description = $request->input('description');

        $way->save();

        return redirect()->route('admin.diet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $way = Health::find($id);
        if ($way->image != 'default.jpg')
            @unlink('uploads/health/diet/' . $way->image);
        $way->delete();
        return redirect()->route('admin.diet.index');
    }
}