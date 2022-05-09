<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function produk()
    {
        // all data produk from database ascending
        $produk = Produk::orderBy('id', 'desc')->paginate(10);

        return view('admin.produk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request data and validation
        $request->validate([
            'files' => 'required',
            'nama' => 'required|max:25',
            'model' => 'required',
            'harga' => 'required|numeric',
            'quantity' => 'required|numeric',
            'diskon' => 'numeric|max:100',
        ]);

        // save data
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->model = $request->model;
        $produk->harga = $request->harga;
        $produk->quantity = $request->quantity;
        $produk->diskon = $request->diskon;

        //  get file
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $extension = $files->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $files->move( public_path('img-produk'), $filename);
            $produk->files = $filename;
        }else {
            return $request;
            $produk->files;
        }

        $produk->save();

        return redirect('/produk')->with('success', 'Data Produk Berhasil Ditambahkan');
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete
        $produk = Produk::find($id);
        $produk->delete();

        return redirect('/produk')->with('success', 'Data Produk Berhasil Dihapus');
    }
}
