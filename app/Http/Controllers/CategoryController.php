<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::latest()->get();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // validation form
         $this->validate($request,[
            'name' => 'required|min:3'
        ]);

        // create ke database
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // cari data yg mau di edit berdasarkan id
        $category=Category::findOrFail($id);
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                // validasi
                $this->validate($request,[
                    'name' => 'required|min:3'
                ]);

                // cari yg mau di edit
                $category=Category::findOrFail($id);
                // update ke database
            $category->update([
                'name' => $request->name
            ]);

            return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // cari yg mau di delete
         $category=Category::findOrFail($id);

         // delete row data dalam database
         $category->delete();

         return redirect()->route('categories.index');
    }
}
