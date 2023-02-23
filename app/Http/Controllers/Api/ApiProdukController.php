<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProdukController extends Controller
{
    public function index()
    {
        $data = Produk::all();
        Log::info('user mengambil data produk');
        return ProdukResource::collection($data);
    }

    public function show($id)
    {
        $data = Produk::find($id);
        Log::info('user menampilkan data produk');
        return new ProdukResource($data);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'judulProduk'     => 'required',
            'deskripsi'     => 'required',
            'harga'   => 'required',
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('foto/', $image->hashName());

        //create post
        $data = Produk::create([
            'judulProduk'     => $request->judulProduk,
            'deskripsi'   => $request->deskripsi,
            'harga'   => $request->harga,
            'gambar'     => $image->hashName(),  

        ]);

        //return response
        return new ProdukResource($data);
        Log::info('user menyimpan data produk');
    }
    
    public function update(Request $request, $id)
    {

        $data = Produk::find($id);

        //check if image is not empty
        if ($request->hasFile('gambar')) {

            //upload image
            $image = $request->file('gambar');
            $image->storeAs('foto/', $image->hashName());

            //delete old image
            Storage::delete('foto/'.$data->gambar);

            //update post with new image
            $data->update([
                'judulProduk'     => $request->judulProduk,
                'deskripsi'   => $request->deskripsi,
                'harga'   => $request->harga,
                'gambar'     => $image->hashName(),  
            ]);

        }

        //return response
        return new ProdukResource($data);
        Log::info('user mengupdate data produk');
    }

    public function destroy($id)
    {

        $data = Produk::find($id);

        //delete image
        Storage::delete('foto/'.$data->image);

        //delete post
        $data->delete();

        Log::info('user telah mengahapus data');
        return new ProdukResource([
            'message' => 'Data Sudah Dihapus',
        ]);
    }
}
