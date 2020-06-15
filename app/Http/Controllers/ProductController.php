<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(2);

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'required|image',
        ]);

        $post = new Product;

        $post->name = $request->name;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->category = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($image->isValid()) {
                // has name image
                $image_name = $image->getClientOriginalName();
                $image_name = uniqid();
                $extension = $image->extension();
                $image_name .= '.' . $extension;

                $upload_path = 'UploadedFile';
                $image->move($upload_path, $image_name);
                $post->image = $image_name;
            }
        }

        $post->save();
        return redirect('products')->with('message', 'Product has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'image',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if (isset($product->image) && file_exists('UploadedFile/' . $product->image)) {
                unlink('UploadedFile/' . $product->image);
            }

            if ($image->isValid()) {
                // has name image
                $image_name = $image->getClientOriginalName();
                $image_name = uniqid();
                $extension = $image->extension();
                $image_name .= '.' . $extension;

                $upload_path = 'UploadedFile';
                $image->move($upload_path, $image_name);
                $request->image = $image_name;
            }
        } else {
            $request->image = $product->image;
        }

        Product::where('id', $product->id)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'category' => $request->category,
                'image' => $request->image
            ]);

        return redirect('products')->with('message', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (file_exists('UploadedFile/' . $product->image)) {
            unlink('UploadedFile/' . $product->image);
        }

        $product->delete();
        return redirect('products')->with('message', 'Product has been deleted');
    }
}
