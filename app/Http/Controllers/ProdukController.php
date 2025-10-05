<?php

namespace App\Http\Controllers;

use App\Models\{Produk, Showroom};
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\MainController;
use File, Auth;

class ProdukController extends Controller
{
   public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            // 'id_showroom' => 'required',
            'harga' => 'required',
            'nama_produk' => 'required',
            'tahun_produksi' => 'required',
            'teknologi' => 'required',
            'kapasitas_mesin' => 'required',
            // 'gambar' => 'required',
        ]);
        return $validator;
    }
    
    public function index(Request $req)
    {
        // dd($req);
        $id = Auth::guard('showroom')->user()->id;
        return view('produk.index', [
            'data' => MainController::getAllDataById(Produk::class, 'id_showroom', $id),
            // "showroom" => MainController::getAllData(Showroom::class)
        ]);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        // dd($request->file('gambar'));
        $validate = $this->validateForm($request);
        $input = $request->except(['_token']);
        $input['id_showroom'] = Auth::guard('showroom')->user()->id;
        if($validate->fails()){
            return response()->json([
                'error' => true,
                'message' => $validate->errors()->toArray()
            ], 422);
        }
        if($request->file('gambar')){
            $fileName = MainController::storeFile($request,'gambar', 'gambar_produk');
        }
        $input['gambar'] = $fileName;
        // dd($input);
        $data = MainController::store(Produk::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
    }

    public function show(Produk $produk)
    {
        //
    }

    
    public function edit($id)
    {
        //
        // dd($id);
        return MainController::findId(Produk::class, $id);
        
    }

    
    public function update(Request $request, $id)
    {
        // dd($id);
        // dd($request->file('gambar'));
        // dd($request);

        $validate = $this->validateForm($request);
        $oldData = MainController::findId(Produk::class, $id);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token', '_method']);
        $input['id_showroom'] = Auth::guard('showroom')->user()->id;
        if($request->file('gambar')){
            $fileName = MainController::storeFile($request,'gambar', 'gambar_produk');
            File::delete('gambar_produk/'.$oldData->gambar);
            $input['gambar'] = $fileName;
        }


        $data = MainController::update(Produk::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    
    public function destroy($id)
    {
        $destroy = MainController::destroy(Produk::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
