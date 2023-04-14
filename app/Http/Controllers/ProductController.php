<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Validation\Rules\Unique;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $form
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $form)
    {
        //
        try {
            $data= $form->formData();
            if ($form->hasFile('product_thumbnail')) {
            $image = $form->file('product_thumbnail');

            // Generate a unique filename for the uploaded image
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();

            // Use Intervention/Image to resize and save the image
            Image::make($image)->save(public_path('uploads/products/' . $filename));
            $data ['product_thumbnail'] =$filename;

            }
            // $create = Product::create(array_merge($data, ['product_thumbnail' => $filename]));
            $create = Product::create($data);
            if ($create) {
                return back()->with('success', 'Product Created Successfully!!!');
            }
        } catch (\Exception $e) {
            return $e;
            return back()->withErrors($e->getMessage())->withInput();
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
        //
        $product = Product::whereId($id)->first();
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::whereId($id)->first();
        if (!$product) {
            return redirect('products');
        }
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $form
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $form, $id)
    {
        //
        try {
            $data = $form->formData();
            if ($form->hasFile('product_thumbnail')) {
                $image = Product::whereId($id)->first()->product_thumbnail;
                $link = public_path('uploads/products/' . $image);
                unlink($link);
                $image = $form->file('product_thumbnail');
                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                Image::make($image)->save(public_path('uploads/products/' . $filename));
                $data['product_thumbnail'] = $filename;
            }
            $update = Product::whereId($id)->update($data);
            if ($update) {
                return back()->with('success', 'Product Created Successfully!!!');
            }
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
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
        try {
            $product = Product::whereId($id);
            if ($product->delete()) {
                return redirect('products')->with('success', "Data Delete successfully");
            }
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }
}
