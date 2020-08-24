<?php

namespace App\Http\Controllers\Backend\health;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\health\Hobbies;

class HobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hobbies = Hobbies::orderBy('id')->get();
        return view('backend.health.hobbies.index', compact('hobbies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.health.hobbies.create');
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
        if (!file_exists('uploads/health/hobbies')) {
            mkdir('uploads/health/hobbies', 0755, true);
        }
        
        $hobby = new Hobbies;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '\uploads\health\hobbies\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
        }
        else {
            $fileName = 'default.jpg';
        }

        $hobby->title = $request->input('title');
        $hobby->image = $fileName;
        $hobby->description = $request->input('description');

        $hobby->save();

        return redirect()->route('admin.hobbies.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hobby = Hobbies::find($id);
        return view('backend.health.hobbies.edit', compact('hobby'));
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
        if (!file_exists('uploads/health/hobbies')) {
            mkdir('uploads/health/hobbies', 0755, true);
        }
        
        $hobby = Hobbies::find($id);

        if ($request->hasFile('image')) {
            // 先刪除原本的圖片
            if ($hobby->image != 'default.jpg')
                @unlink('uploads/health/hobbies/' . $hobby->image);
            $file = $request->file('image');
            $path = public_path() . '\uploads\health\hobbies\\';
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);

            $hobby->image = $fileName;
        }

        $hobby->title = $request->input('title');
        $hobby->description = $request->input('description');

        $hobby->save();

        return redirect()->route('admin.hobbies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hobby = Hobbies::find($id);
        if ($hobby->image != 'default.jpg')
            @unlink('uploads/health/hobbies/' . $hobby->image);
        $hobby->delete();
        return redirect()->route('admin.hobbies.index');
    }
}