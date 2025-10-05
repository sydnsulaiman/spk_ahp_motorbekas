<?php

namespace App\Http\Controllers;

use App\Models\{Perhitungan, Kriteria, KriteriaSummary, Subkriteria,SubkriteriaSummary, Produk};
use Illuminate\Http\Request;
use DB, Auth;

class PerhitunganController extends Controller
{
   
    public function index()
    {
        // dd(Auth::user());
        return view('perhitungan.index',[
            "data" => MainController::getAllData(Perhitungan::class)
        ]);
    }


    public function indexDetail($id)
    {
        // $kriteria = DB::table('bobot_kriterias')
        //                     ->where('id_perhitungan', $id)
        //                     ->orderBy('id_kriteria', 'asc')
        //                     ->orderBy('id_kriteria_tujuan', 'asc')
        //                     // ->groupBy('id_kriteria')
        //                     ->get();
        $idKHarga = Kriteria::where('nama_kriteria','LIKE', '%harga%')->first()->id;
        $idKTahun = Kriteria::where('nama_kriteria','LIKE', '%tahun%')->first()->id;
        $idKKps = Kriteria::where('nama_kriteria','LIKE', '%kapasitas%')->first()->id;


        // $subkrit = Subkriteria::where('id_kriteria', $idKTahun)->get();
        

        // $bobotSubkrit =DB::table('bobot_subkriterias')
        //                     ->where('id_perhitungan', $id)
        //                     ->where('id_kriteria', $idKTahun)
        //                     ->orderBy('id_subkriteria', 'asc')
        //                     ->orderBy('id_subkriteria_tujuan', 'asc')
        //                     ->get();
        // // dd($subkrit);
        // dd($bobotSubkrit, $subkrit);
        
        // $getSubrkiteriaHarga = Subkriteria::where('id_kriteria', $idKHarga)->get();
        // $getSubrkiteriaTahun = Subkriteria::where('id_kriteria', $idKTahun)->get();
        // $getSubrkiteriaKapasitasMesin = Subkriteria::where('id_kriteria', $idKKps)->get();


        // $product = MainController::getAllData(Produk::class);

        // foreach ($product as $key) {
        //     $this->convertSubkriteria($key, $getSubrkiteriaHarga, 'harga', 'sub_harga');
        //     $this->convertSubkriteria($key, $getSubrkiteriaTahun, 'tahun_produksi', 'sub_tahun');
        //     $this->convertSubkriteria($key, $getSubrkiteriaKapasitasMesin, 'kapasitas_mesin', 'sub_kps');
            
        // }

        // dd($product, $getSubrkiteriaTahun);

        $product = $this->calculateAllProduk($id);
        // dd($product);

        return view('perhitungan.detail_perhitungan',[
            'produk' => $product,
            'kriteria' => MainController::getAllData(Kriteria::class),
            'perhitungan' => MainController::findId(Perhitungan::class, $id),
            'kriteria_summaries' => KriteriaSummary::where('id_perhitungan', $id)
                                    ->orderBy('id_kriteria', 'asc')
                                    ->get(),
            "bobot_kriteria" => DB::table('bobot_kriterias')
                            ->where('id_perhitungan', $id)
                            ->orderBy('id_kriteria', 'asc')
                            ->orderBy('id_kriteria_tujuan', 'asc')
                            ->get(),
            //harga
            'subkriteria_harga' => Subkriteria::where('id_kriteria', $idKHarga)->get(),
            "bobot_subkriteria_harga" => DB::table('bobot_subkriterias')
                            ->where('id_perhitungan', $id)
                            ->where('id_kriteria', $idKHarga)
                            ->orderBy('id_subkriteria', 'asc')
                            ->orderBy('id_subkriteria_tujuan', 'asc')
                            ->get(),
            'subkriteria_summariesH' => SubkriteriaSummary::where('id_perhitungan', $id)
                                    ->where('id_kriteria', $idKHarga)
                                    ->orderBy('id_subkriteria','asc')
                                    ->get(),
            //tahun                                    
            'subkriteria_tahun' => Subkriteria::where('id_kriteria', $idKTahun)->get(),
            "bobot_subkriteria_tahun" => DB::table('bobot_subkriterias')
                            ->where('id_perhitungan', $id)
                            ->where('id_kriteria', $idKTahun)
                            ->orderBy('id_subkriteria', 'asc')
                            ->orderBy('id_subkriteria_tujuan', 'asc')
                            ->get(),
            'subkriteria_summariesT' => SubkriteriaSummary::where('id_perhitungan', $id)
                                    ->where('id_kriteria', $idKTahun)
                                    ->orderBy('id_subkriteria','asc')
                                    ->get(),
            //kps mesin                                    
            'subkriteria_kps' => Subkriteria::where('id_kriteria', $idKKps)->get(),
            "bobot_subkriteria_kps" => DB::table('bobot_subkriterias')
                            ->where('id_perhitungan', $id)
                            ->where('id_kriteria', $idKKps)
                            ->orderBy('id_subkriteria', 'asc')
                            ->orderBy('id_subkriteria_tujuan', 'asc')
                            ->get(),
            'subkriteria_summariesKps' => SubkriteriaSummary::where('id_perhitungan', $id)
                                    ->where('id_kriteria', $idKKps)
                                    ->orderBy('id_subkriteria','asc')
                                    ->get(),
            
        ]);
    }

    private function calculateAllProduk($idPerhitungan){
        $idKHarga = Kriteria::where('nama_kriteria','LIKE', '%harga%')->first()->id;
        $idKTahun = Kriteria::where('nama_kriteria','LIKE', '%tahun%')->first()->id;
        $idKKps = Kriteria::where('nama_kriteria','LIKE', '%kapasitas%')->first()->id;

        $getSubrkiteriaHarga = Subkriteria::
                               leftJoin('subkriteria_summaries', 'subkriterias.id', 'subkriteria_summaries.id_subkriteria')
                               ->leftJoin('kriteria_summaries', 'subkriterias.id_kriteria', 'kriteria_summaries.id_kriteria')
                               ->where('subkriterias.id_kriteria', $idKHarga)
                               ->where('kriteria_summaries.id_perhitungan', $idPerhitungan) 
                               ->select('subkriterias.*', 'subkriteria_summaries.prioritas as prioritas_subkriteria', 'kriteria_summaries.prioritas as prioritas_kriteria')
                               ->get();
        $getSubrkiteriaTahun = Subkriteria::
                               leftJoin('subkriteria_summaries', 'subkriterias.id', 'subkriteria_summaries.id_subkriteria')
                               ->leftJoin('kriteria_summaries', 'subkriterias.id_kriteria', 'kriteria_summaries.id_kriteria')
                               ->where('subkriterias.id_kriteria', $idKTahun)
                               ->where('kriteria_summaries.id_perhitungan', $idPerhitungan) 
                               ->select('subkriterias.*', 'subkriteria_summaries.prioritas as prioritas_subkriteria', 'kriteria_summaries.prioritas as prioritas_kriteria')
                               ->get();
        $getSubrkiteriaKapasitasMesin = Subkriteria::
                               leftJoin('subkriteria_summaries', 'subkriterias.id', 'subkriteria_summaries.id_subkriteria')
                               ->leftJoin('kriteria_summaries', 'subkriterias.id_kriteria', 'kriteria_summaries.id_kriteria')
                               ->where('subkriterias.id_kriteria', $idKKps)
                               ->where('kriteria_summaries.id_perhitungan', $idPerhitungan) 
                               ->select('subkriterias.*', 'subkriteria_summaries.prioritas as prioritas_subkriteria', 'kriteria_summaries.prioritas as prioritas_kriteria')
                               ->get();

        $product = Produk::leftJoin('showrooms', 'produks.id_showroom', 'showrooms.id')
                    ->select('produks.*', 'showrooms.nama_showroom AS nama_showroom', 'showrooms.alamat AS alamat_showroom')
                    ->get();
        // dd($product);

        foreach ($product as $key) {
            $this->convertSubkriteria($key, $getSubrkiteriaHarga, 'harga', 'sub_harga');
            $this->convertSubkriteria($key, $getSubrkiteriaTahun, 'tahun_produksi', 'sub_tahun');
            $this->convertSubkriteria($key, $getSubrkiteriaKapasitasMesin, 'kapasitas_mesin', 'sub_kps');
            
        }
        foreach ($product as $key) {
            $filtered = collect($key)->filter(function ($value, $val) {
                            return str_contains($val, 'total_prioritas');
                        });
            $key['total_fix'] = $filtered->sum();
            // dump($filtered, $key['total_fix']);
        }
        $product = $product->sortBy([
                        ['total_fix', 'desc']
                    ]);

        return $product;
        // foreach ($product as $key){
        //     $key['total_all_prioritas'] = array_sum(array_filter($key, function($value, $d) {
        //                                         return str_contains($d, 'total_prioritas');
        //                                     }, ARRAY_FILTER_USE_BOTH));
        //     dump($key);
        // }
        // dd($product, $getSubrkiteriaHarga);
    }

    public function convertSubkriteria($key, $dataSubkriteria, $tipe, $valueVariable){
        
        foreach ($dataSubkriteria as $gsk) {
                
                if($gsk->operator == '<' ){
                    if($tipe == 'tahun_produksi'   ){
                        $totalTahun = date('Y') - $key[$tipe];
                        if($totalTahun < $gsk->nilai_pembanding && empty($key[$valueVariable]) ){
                            $key[$valueVariable] = $gsk->nama_subkriteria;
                            $key['id_'.$valueVariable] = $gsk->id;
                            $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                            $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                            $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                            
                            
                            // dump($totalTahun, $gsk->nama_subkriteria); 
                        }

                    }else{
                        if($key[$tipe] < $gsk->nilai_pembanding && empty($key[$valueVariable])){
                            $key[$valueVariable] = $gsk->nama_subkriteria;
                            $key['id_'.$valueVariable] = $gsk->id;
                            
                            $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                            $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                            $key['total_'.$valueVariable] =$key[$tipe] - $gsk->nilai_pembanding;
                            $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                            
                            // dump($gsk->nama_subkriteria); 

                        }
                    }
                    
                }
                if($gsk->operator == '>' ){
                    // dump($gsk->operator);
                    if($tipe == 'tahun_produksi'){
                        $totalTahun = date('Y') - $key[$tipe];
                        if($totalTahun > $gsk->nilai_pembanding && empty($key[$valueVariable])){
                            $key[$valueVariable] = $gsk->nama_subkriteria;
                            $key['id_'.$valueVariable] = $gsk->id;
                            $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                            $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                            $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                            
                        
                        }
                        
                    }else{
                        // if(empty($key[$valueVariable])){
                        //     dump($tipe, $gsk->nama_subkriteria, $key[$tipe] > $gsk->nilai_pembanding, empty($key[$valueVariable])); 
                            if($key[$tipe] > $gsk->nilai_pembanding && empty($key[$valueVariable]) ){
                                $key[$valueVariable] = $gsk->nama_subkriteria;
                                $key['id_'.$valueVariable] = $gsk->id;
                                $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                                $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                                $key['total_'.$valueVariable] = $key[$tipe] - $gsk->nilai_pembanding;
                                $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                                
                            }else{
                                $valSebelumnya = $key['total_'.$valueVariable];
                                $valSekarang = $key[$tipe] - $gsk->nilai_pembanding;
                                // dump($valSebelumnya, 'val sekarang', $valSekarang, $valSebelumnya > $valSekarang);
                                if($valSekarang < $valSebelumnya && $valSekarang > 0){
                                    $key[$valueVariable] = $gsk->nama_subkriteria;
                                    $key['id_'.$valueVariable] = $gsk->id;
                                    $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                                    $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                                    $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                                    
                                    
                                }
                            }
                        // }

                    }
                }
                if($gsk->operator == '>=' ){
                    if($tipe == 'tahun_produksi'){
                        $totalTahun = date('Y') - $key[$tipe];
                        if($totalTahun >= $gsk->nilai_pembanding && empty($key[$valueVariable])){
                            $key[$valueVariable] = $gsk->nama_subkriteria;
                           $key['id_'.$valueVariable] = $gsk->id;
                            $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                            $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                            $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                        
                        }
                        
                    }else{
                        // if(empty($key[$valueVariable])){
                        //     dump($tipe, $gsk->nama_subkriteria, $key[$tipe] > $gsk->nilai_pembanding, empty($key[$valueVariable])); 
                            if($key[$tipe] >= $gsk->nilai_pembanding && empty($key[$valueVariable]) ){
                                $key[$valueVariable] = $gsk->nama_subkriteria;
                                $key['id_'.$valueVariable] = $gsk->id;
                                $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                                $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                                $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                                $key['total_'.$valueVariable] =$key[$tipe] - $gsk->nilai_pembanding;
                                
                            }else{
                                $valSebelumnya = $key['total_'.$valueVariable];
                                $valSekarang = $key[$tipe] - $gsk->nilai_pembanding;
                                // dump($valSebelumnya, 'val sekarang', $valSekarang, $valSebelumnya > $valSekarang);
                                if($valSekarang < $valSebelumnya && $valSekarang > 0){
                                    $key[$valueVariable] = $gsk->nama_subkriteria;
                                    $key['id_'.$valueVariable] = $gsk->id;
                                    $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                                    $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                                    $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;

                                    
                                    
                                }
                            }
                        // }

                    }
                }
                if($gsk->operator == '<=' ){
                    if($tipe == 'tahun_produksi'){
                        $totalTahun = date('Y') - $key[$tipe];
                        if($totalTahun >= $gsk->nilai_pembanding && empty($key[$valueVariable])){
                            $key[$valueVariable] = $gsk->nama_subkriteria;
                            $key['id_'.$valueVariable] = $gsk->id;
                            
                            $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                            $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                            $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                            
                        
                        }
                        
                    }else{
                        // if(empty($key[$valueVariable])){
                        //     dump($tipe, $gsk->nama_subkriteria, $key[$tipe] > $gsk->nilai_pembanding, empty($key[$valueVariable])); 
                            if($key[$tipe] <= $gsk->nilai_pembanding && empty($key[$valueVariable])){
                                $key[$valueVariable] = $gsk->nama_subkriteria;
                                $key['id_'.$valueVariable] = $gsk->id;
                                $key['prioritas_'.$tipe] = $gsk->prioritas_kriteria;
                                $key['subprioritas_'.$valueVariable] = $gsk->prioritas_subkriteria;
                                $key['total_prioritas_'.$tipe] = $gsk->prioritas_kriteria * $gsk->prioritas_subkriteria;
                                $key['total_'.$valueVariable] =$key[$tipe] - $gsk->nilai_pembanding;
                                
                            }
                        // }

                    }
                }
                
        }
        return $key;
    }

    

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Perhitungan $perhitungan)
    {
        //
    }

    
    public function edit(Perhitungan $perhitungan)
    {
        //
    }

    
    public function update(Request $request, Perhitungan $perhitungan)
    {
        //
    }

    
    public function destroy(Perhitungan $perhitungan)
    {
        //
    }
}
