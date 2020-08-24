<?php

namespace App\Http\Controllers\Backend\health;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\health\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Test::orderBy('id')->get();
        return view('backend.health.test.index', compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.health.test.create');
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
        if (!file_exists('uploads/health/test')) {
            mkdir('uploads/health/test', 0755, true);
        }
        
        $way = new Test;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '\uploads\health\test\\';
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

        return redirect()->route('admin.test.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $way = Test::find($id);
        return view('backend.health.test.edit', compact('way'));
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
        if (!file_exists('uploads/health/test')) {
            mkdir('uploads/health/test', 0755, true);
        }
        
        $way = Test::find($id);

        if ($request->hasFile('image')) {
            // 先刪除原本的圖片
            if ($way->image != 'default.jpg')
                @unlink('uploads/health/test/' . $way->image);
            $file = $request->file('image');
            $path = public_path() . '\uploads\health\test\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $way->image = $fileName;
        }

        $way->title = $request->input('title');
        $way->description = $request->input('description');

        $way->save();

        return redirect()->route('admin.test.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $way = Test::find($id);
        if ($way->image != 'default.jpg')
            @unlink('uploads/health/test/' . $way->image);
        $way->delete();
        return redirect()->route('admin.test.index');
    }
}