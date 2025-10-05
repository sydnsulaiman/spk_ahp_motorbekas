<?php

namespace App\Http\Controllers;
use Validator;

use App\Models\{Subkriteria, Kriteria};
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
   
    public function validateForm($req){
        $validator = Validator::make($req->all(), [ 
            'nama_subkriteria' => 'required',
            'kode_subkriteria' => 'required',
            // 'operator' => 'required',
            // 'nilai_pembanding' => 'required',
            // 'satuan' => 'required',


        ]);
        return $validator;
    }
   
    public function index()
    {
        //
        return view('subkriteria.index',[
            "data" => MainController::getAllData(Subkriteria::class),
            'kriteria' => MainController::getAllData(Kriteria::class)
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
        // dd($input);
        $data = MainController::store(Subkriteria::class, $input);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil disimpan!',
            'data' => $data
        ], 200);
    }

    
    public function show(subkriteria $subkriteria)
    {
        //
    }

    
    public function edit($id)
    {
        //
        return MainController::findId(Subkriteria::class, $id);

    }

    
    public function update(Request $request, $id)
    {
        // dd($id,$request);
        $validate = $this->validateForm($request);
        $oldData = MainController::findId(Subkriteria::class, $id);

        if($validate->fails()){
            return response()->json([
                'error' => true,
                'errors' => $validate->errors()->toArray()
            ], 422);
        }

        $input = $request->except(['_token', '_method']);
        
        $data = MainController::update(Subkriteria::class, $input, $id);

        
        return response()->json([
            'success'=> true,
            'message' => 'Data berhasil diperbaharui!',
            'data' => $data
        ], 200);
    }

    public function destroy($id)
    {
        $destroy = MainController::destroy(Subkriteria::class, $id);
        return response()->json([
            'delete'=> true,
            'message' => 'Data berhasil dihapus!',
            'data' => $destroy
        ], 200);
    }
}
