<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
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
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('product.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'desc' => 'required',
                'photo' => 'required',
                'brand_id' => 'required',
                'type' => 'required',
                'recomendation' => 'required',
            ],
            [
                'name.required' => 'Kolom nama harus diisi !',
                'price.required' => 'Kolom harga harus diisi !',
                'desc.required' => 'Kolom description harus diisi !',
            ]
        );
        $file = $request->file('photo'); //ini dimasukan ke dalam direktori laravel
        $fileName = 'photo' . time() . uniqid() . '-' . $file->getClientOriginalName();

        $file->move(public_path('images/product'), $fileName);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
            'desc' => $request->desc,
            'type' => $request->type,
            'recomendation' => $request->recomendation,
            'photo' => $fileName
        ]);

        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
