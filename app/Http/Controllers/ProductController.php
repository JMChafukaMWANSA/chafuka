<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(100)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index')
            ->withSuccess('New product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->back()
            ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete(Request $req)
    {
        $product = product::find($req->id);
        $product->delete();
        return redirect()->route('products.index')
            ->withSuccess('Product is deleted successfully.');

    }
}

