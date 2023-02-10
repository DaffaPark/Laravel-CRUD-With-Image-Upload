<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    
    public function index()
    {
        $data = Produk::all();
        return view('produk.index', compact('data'));
    }

    public function create()
    {
        return view('produk.create');
    }

        public function store(Request $request)
        {
            $request->validate([
                'judulProduk' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
      
            $input = $request->all();
      
            if ($gambar = $request->file('gambar')) {
                $destinationPath = 'foto/';
                $fotogambar = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
                $gambar->move($destinationPath, $fotogambar);
                $input['gambar'] = "$fotogambar";
            }
        
            Produk::create($input);
         
            return redirect('/produk')->with('success','Produk Berhasil Ditambahkan!');
        
        }

    public function edit($id)
    {
        $data = Produk::find($id);
        return view('produk.edit', compact('data'));
    }

    public function update(Request $request,$id, Produk $produk)
    {
        $produk = Produk::find($id);
        $request->validate([
            'judulProduk' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'foto/';
            $fotogambar = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $fotogambar);
            $input['gambar'] = "$fotogambar";
        }else{
            unset($input['gambar']);
        }
          
        $produk->update($input);
        
        return redirect('/produk')->with('success','Produk Berhasil Diupdate!');
    }
    

    public function destroy($id)
    {
        $data = Produk::find($id);
        $data->delete();

        return redirect('/produk')->with('success','Produk Berhasil Dihapus!');
    }
}
