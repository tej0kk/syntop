<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValue;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'name' => 'required|image|mimes:jpg,png,jpeg|max:2048'
            ],
            [
                'name.required' => 'Photo harus diisi !',
                'name.image' => 'Photo harus berupa gambar !',
                'name.mimes' => 'Gambar harus jpg, png, jpeg',
                'name.max' => 'Gambar maksimal berukuran 2MB'
            ]
        );

        if ($request->photo == 'on') {
            $photo = 'show';
        } else {
            $photo = 'hide';
        }

        $file = $request->file('name'); //ini dimasukan ke dalam direktori laravel
        $fileName = 'banner' . time() . uniqid() . '-' . $file->getClientOriginalName();

        $file->move(public_path('images/banner'), $fileName);

        Banner::create([
            'name' => $fileName,
            'photo' => $photo
        ]);

        return redirect('/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        // return $request;
        $request->validate(
            [
                'name' => 'image|mimes:jpg,png,jpeg|max:2048'
            ],
            [
                'name.image' => 'Photo harus berupa gambar !',
                'name.mimes' => 'Gambar harus jpg, png, jpeg',
                'name.max' => 'Gambar maksimal berukuran 2MB'
            ]
        );

        if ($request->photo == 'on') {
            $photo = 'show';
        } else {
            $photo = 'hide';
        }

        if (isset($request->name)) {
            unlink(public_path('images/banner/'. $banner->name));
            
            $file = $request->file('name'); //ini dimasukan ke dalam direktori laravel
            $fileName = 'banner' . time() . uniqid() . '-' . $file->getClientOriginalName();
            $file->move(public_path('images/banner'), $fileName);

            Banner::where('id', $banner->id)->update([
                'name' => $fileName,
                'photo' => $photo
            ]);
        }else{
            Banner::where('id', $banner->id)->update([
                'photo' => $photo
            ]);
        }

        return redirect('/banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        // return $banner;
        unlink(public_path('images/banner/'. $banner->name));
        Banner::destroy('id', $banner->id);
        return redirect('/banner');

    }
}
