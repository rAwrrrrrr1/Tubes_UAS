<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use DB;
use App\Http\Resources\BarangResource;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
    * index
    *
    * @return void
    */
    public function index()
    {
        //get barang
        $barang = Barang::latest()->get();
        //render view with posts
        return new BarangResource(true, 'List Data Barang', $barang);
    }

    public function create()     
    {         
        return view('barang.create');     
    }

    public function store(Request $request)
    {
        //Validasi Formulir
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'nama_kategori' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //Fungsi Post ke Database
        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'nama_kategori' => $request->nama_kategori,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
        ]);
        return new BarangResource(true, 'Data Barang Berhasil Ditambahkan!', $barang);
    }
 
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit', compact('barang'));
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
        $request->validate([
            'nama_barang'  => 'required',             
            'nama_kategori'     => 'required',             
            'jumlah_barang'   => 'required'
        ]);

        $barang = Barang::find($id);          
            $barang->nama_barang  = $request->get('nama_barang');             
            $barang->nama_kategori     = $request->get('nama_kategori'); 
            $barang->jumlah_barang   = $request->get('jumlah_barang');
            $barang->save();         
        
            return redirect('/barang')->with('success', 'Barang updated.');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang deleted successfully');
    }
}
