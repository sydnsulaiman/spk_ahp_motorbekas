<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;
use File, Validator, Hash, Auth;
use App\Http\Controllers\MainController;
use App\Models\{Produk};

class ShowroomController extends Controller
{
   public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_showroom' => 'required',
            'nama_pic' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tahun_berdiri' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            // 'gambar' => 'required',
        ]);
        return $validator;
    }
    
    public function index()
    {
        // dd($req);
        // dd(Auth::guard('showroom')->user()->id);
        return view('showroom.index', [
            'data' => MainController::getAllData(Showroom::class)
        ]);
    }

    public function indexProfileShowroom(){
        // dd(Auth::guard('showroom')->user());

        return view('showroom.index-profile', [
            'profile' => Auth::guard('showroom')->user(),
            "produk" => Produk::orderBy('id','desc')->take(5)->get()
        ]);
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {   
        // dd($request);
        $validate = $this->validateForm($request);
        $input = $request->except(['_token']);
        
        if($validate->fails()){
            return response()->json([
                'error' => true,
                'message' => $validate->errors()->toArray()
            ], 422);
        }
        if($request->file('gambar')){
            $fileName = MainController::storeFile($request,'gambar', 'gambar_showroom');
        }
        $input['gambar'] = $fileName;
        $input['password'] = Hash::make($request->password);
        // dd($input);
        $data = MainController::store(Showroom::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
    }

    public function show(Showroom $showroom)
    {
        //
    }

    
    public function edit($id)
    {
        //
        // dd($id);
        return MainController::findId(Showroom::class, $id);
        
    }

    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [ 
            'nama_showroom' => 'required',
            'nama_pic' => 'required',
            'email' => 'required',
            'tahun_berdiri' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            // 'gambar' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validator->errors()->toArray()
            ], 422);
        }
        $oldData = MainController::findId(Showroom::class, $id);
        $input = $request->except(['_token', '_method']);

        if($request->password !== null ){
            // dd($request->all());
            $input['password'] = Hash::make($request->password);
        }else{
            $input['password'] = $oldData->password;    
        }

        if($request->file('gambar')){
            $fileName = MainController::storeFile($request,'gambar', 'gambar_showroom');
            File::delete('gambar_showroom/'.$oldData->gambar);
            $input['gambar'] = $fileName;
        }
        // dd('input',$input);

        $data = MainController::update(Showroom::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    
    public function destroy($id)
    {
        $oldData = MainController::findId(Showroom::class, $id);
        File::delete('gambar_showroom/'.$oldData->gambar);
        $destroy = MainController::destroy(Showroom::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
