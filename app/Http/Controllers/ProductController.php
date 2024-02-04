<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::latest()->get();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::latest()->get();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation form
        $this->validate($request,[
        'foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'category_id' => 'required',
        'name' => 'required|min:3',
        'code' => 'required',
        'stock' => 'required'
        ]);

        // upload file
        $image = $request->file('foto');
        $image->storeAs('public/products',$image->hashName());

        // create ke database
        Product::create([
            'foto' =>$image->hashName(),
            'category_id' => $request->category_id,
            'name' => $request->name,
            'code' => $request->code,
            'keterangan' => $request->keterangan,
            'stock' => $request->stock
        ]);

        return redirect()->route('products.index');

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
        $categories=Category::latest()->get();
        // cari data yg mau di edit berdasarkan id
        $product=Product::findOrFail($id);
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation form
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required|min:3',
            'code' => 'required',
            'stock' => 'required'
        ]);

        // cari yg mau di edit
        $product=Product::findOrFail($id);

        // cek ada upload image apa nggak
        if ($request->hasFile('foto')){
            // upload file
            $image = $request->file('foto');
            $image->storeAs('public/products',$image->hashName());

            $product->update([
                'foto' =>$image->hashName(),
                'category_id' => $request->category_id,
                'name' => $request->name,
                'code' => $request->code,
                'keterangan' => $request->keterangan,
                'stock' => $request->stock
            ]);
        }else{
            $product->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'code' => $request->code,
                'keterangan' => $request->keterangan,
                'stock' => $request->stock
            ]);

        }

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
