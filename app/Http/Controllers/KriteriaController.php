<?php

namespace App\Http\Controllers;
use Validator;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_kriteria' => 'required',
            'kode_kriteria' => 'required',
        ]);
        return $validator;
    }
   
    public function index()
    {
        //
        return view('kriteria.index',[
            "data" => MainController::getAllData(Kriteria::class)
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validate = $this->validateForm($request);
        $input = $request->except(['_token']);
        if($validate->fails()){
            return response()->json([
                'error' => true,
                'message' => $validate->errors()->toArray()
            ], 422);
        }
        // dd($input);
        $data = MainController::store(Kriteria::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
    }

    
    public function show(kriteria $kriteria)
    {
        //
    }

    
    public function edit($id)
    {
        //
        return MainController::findId(Kriteria::class, $id);

    }

    
    public function update(Request $request, $id)
    {
        $validate = $this->validateForm($request);
        $oldData = MainController::findId(Kriteria::class, $id);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token', '_method']);
        
        $data = MainController::update(Kriteria::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(Kriteria::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
