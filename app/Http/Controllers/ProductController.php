<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Support\Facades\File;
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
        $limit = 5;
        $total_product = Product::count();
        $products = Product::paginate($limit);
        $no = $limit * ($products->currentPage() - 1);

        return view('product.index', compact('products', 'no', 'total_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', ['categories' => $categories]);
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
            'id_category' => 'required',
            'image' => 'required|image',
        ]);

        $post = new Product;

        $post->name = $request->name;
        $post->description = $request->description;
        $post->price = $request->price;
        $post->id_category = $request->id_category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if ($image->isValid()) {
                // has name image
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move('UploadedFile', $image_name);
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
        $categories = Category::all();
        return view('product.edit', ['product' => $product, 'categories' => $categories]);
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
            'id_category' => 'required',
            'image' => 'image',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            File::delete('UploadedFile/' . $product->image);

            if ($image->isValid()) {
                // has name image
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

                $image->move('UploadedFile', $image_name);
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
                'id_category' => $request->id_category,
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
        File::delete('UploadedFile/' . $product->image);

        $product->delete();
        return redirect('products')->with('message', 'Product has been deleted');
    }
}
