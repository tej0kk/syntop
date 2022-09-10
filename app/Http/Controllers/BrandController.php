<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
                'icon' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                'name' => 'required|min:3|max:15'
            ],
            [
                'icon.required' => 'Icon harus diisi !',
                'icon.image' => 'Icon harus berupa gambar !',
                'icon.mimes' => 'Icon harus jpg, png, jpeg',
                'icon.max' => 'Icon maksimal berukuran 2MB',
                'name.required' => 'Nama harus diisi !',
                'name.min' => 'Nama minimal 3 karakter',
                'name.max' => 'Nama maksimal 15 karakter'
            ]
        );

        $file = $request->file('icon'); //ini dimasukan ke dalam direktori laravel
        $fileName = 'brand' . time() . uniqid() . '-' . $file->getClientOriginalName();

        $file->move(public_path('images/brand'), $fileName);

        Brand::create([
            'icon' => $fileName,
            'name' => $request->name
        ]);

        return redirect('/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {   
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate(
            [
                'icon' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                'name' => 'required|min:3|max:15'
            ],
            [
                'icon.required' => 'Icon harus diisi !',
                'icon.image' => 'Icon harus berupa gambar !',
                'icon.mimes' => 'Icon harus jpg, png, jpeg',
                'icon.max' => 'Icon maksimal berukuran 2MB',
                'name.required' => 'Nama harus diisi !',
                'name.min' => 'Nama minimal 3 karakter',
                'name.max' => 'Nama maksimal 15 karakter'
            ]
        );

        if (isset($request->icon)) {
            unlink(public_path('images/brand/' . $brand->name));
            $file = $request->file('icon'); //ini dimasukan ke dalam direktori laravel
            $fileName = 'brand' . time() . uniqid() . '-' . $file->getClientOriginalName();

            $file->move(public_path('images/brand'), $fileName);

            Brand::where('id', $brand->id)->update([
                'icon' => $fileName, 
                'name' => $request->name
            ]);
        } else {
            Brand::where('id', $brand->id)->update([
                'name' => $request->name
            ]);
        }

        return redirect('/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        unlink(public_path('images/brand/'. $brand->name));
        Brand::destroy('id', $brand->id);
        return redirect('/brand');
    }
}
