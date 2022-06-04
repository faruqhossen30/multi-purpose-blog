<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.category.show_category', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            $request->image->storeAs('image', $image, 'public');
            Category::create([
                'title' => $request->title,
                'slug' => make_slug($request->title),
                'image' => $image,
            ]);
            return back();
        } else {
            Category::create([
                'title' => $request->title,
                'slug' => make_slug($request->title),
            ]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit_category', compact('category'));
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
        $validated = $request->validate([
            'title' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image->getClientOriginalName();
            $request->image->storeAs('image', $image, 'public');

            Category::findOrFail($id)->update([
                'title' => $request->title,
                'image' => $image,
            ]);
            return redirect()->route('category.index');
        } else {
            Category::findOrFail($id)->update([
                'title' => $request->title
            ]);
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
