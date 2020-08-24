<?php

namespace App\Http\Controllers\Backend\supplements;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\supplements\Vitamins;

class VitaminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vitamins = Vitamins::orderBy('id')->get();
        return view('backend.supplements.vitamins.index', compact('vitamins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplements.vitamins.create');
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
        if (!file_exists('uploads/supplements/vitamins')) {
            mkdir('uploads/supplements/vitamins', 0755, true);
        }
        
        $vitamin = new Vitamins;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '\uploads\supplements\vitamins\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }
        else {
            $fileName = 'default.jpg';
        }

        $vitamin->name = $request->input('name');
        $vitamin->image = $fileName;
        $vitamin->description = $request->input('description');

        $vitamin->save();

        return redirect()->route('admin.vitamins.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vitamin = Vitamins::find($id);
        return view('backend.supplements.vitamins.edit', compact('vitamin'));
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
        if (!file_exists('uploads/supplements/vitamins')) {
            mkdir('uploads/supplements/vitamins', 0755, true);
        }
        
        $vitamin = Vitamins::find($id);

        if ($request->hasFile('image')) {
            // 先刪除原本的圖片
            if ($vitamin->image != 'default.jpg')
                @unlink('uploads/supplements/vitamins/' . $vitamin->image);
            $file = $request->file('image');
            $path = public_path() . '\uploads\supplements\vitamins\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $vitamin->image = $fileName;
        }

        $vitamin->name = $request->input('name');
        $vitamin->description = $request->input('description');

        $vitamin->save();

        return redirect()->route('admin.vitamins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vitamin = Vitamins::find($id);
        if ($vitamin->image != 'default.jpg')
            @unlink('uploads/supplements/vitamins/' . $vitamin->image);
        $vitamin->delete();
        return redirect()->route('admin.vitamins.index');
    }
}