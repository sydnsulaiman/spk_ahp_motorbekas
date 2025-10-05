<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Subkriteria,
    Kriteria,
    Perhitungan,
    BobotKriteria,
    BobotSubkriteria,
    KriteriaSummary,
    SubkriteriaSummary,
    Produk,
    Showroom,
    };
    
use DB, Auth;
class HomeController extends Controller
{
    //
    public function index (){
        
        // session()->flush();
        // dd(Auth::guard('web'), Auth::check());
        return view('landing_page.main',[
            // "kriteria" => MainController::getAllData(Kriteria::class)
            "produk" => Produk::orderBy('id','desc')->take(9)->get()

        ]);
    }

    public function allProduk($idShowroom = null){
        $produk = $idShowroom ? Produk::leftJoin('showrooms', 'produks.id_showroom', 'showrooms.id')
                    ->where('showrooms.id', $idShowroom)
                    ->select('produks.*', 'showrooms.nama_showroom AS nama_showroom', 'showrooms.alamat AS alamat_showroom', 'showrooms.no_hp AS nohp_showroom')
                    ->get()
                    : Produk::leftJoin('showrooms', 'produks.id_showroom', 'showrooms.id')
                    // ->where('showrooms.id', $idShowroom)
                    ->select('produks.*', 'showrooms.nama_showroom AS nama_showroom', 'showrooms.alamat AS alamat_showroom', 'showrooms.no_hp AS nohp_showroom')
                    ->get();
        // dd($produk);

        return view('landing_page.all-produk', compact('produk'));
    }

    
    public function detailProduk($id){
        // dd($id);

        $produk = Produk::leftJoin('showrooms', 'produks.id_showroom', 'showrooms.id')
                    ->where('produks.id', $id)
                    ->select('produks.*', 'showrooms.nama_showroom AS nama_showroom', 'showrooms.alamat AS alamat_showroom', 'showrooms.no_hp AS nohp_showroom')
                    ->first();
        

        return view('landing_page.detail_produk', compact('produk'));
    }

    public function allShowroom(){
        return view('landing_page.all-showroom', [
            'showroom' => MainController::getAllData(Showroom::class)
        ]);
    }
    public function detailShowroom($id){
        // $produk = Produk::leftJoin('showrooms', 'produks.id_showroom', 'showrooms.id')
        //             ->where('produks.id', $id)
        //             ->select('produks.*', 'showrooms.nama_showroom AS nama_showroom', 'showrooms.alamat AS alamat_showroom', 'showrooms.no_hp AS nohp_showroom')
        //             ->get();
        // dd($produk);
        return view('landing_page.detail-showroom', [
            'showroom' => Showroom::where('id', $id)->first(),
            'produk' => Produk::where('id_showroom', $id)
                        ->get()
        ]);
    }


    public function postBobot (Request $request){
        // dd($request->all());

        //
        DB::beginTransaction();
        try {
            //create perhitungan
            //input nama user
            $input = ['nama_user' => 'test'];

            $idPerhitungan = MainController::store(Perhitungan::class, $input)->id;
            
            $this->calculateKriteria($idPerhitungan, $request);
            $data = $request->except('_token');
            $this->calculateSubkriteriaHarga($idPerhitungan, $data);
            // dd($data);
            $this->calculateSubkriteriaTahun($idPerhitungan, $data);
            $this->calculateSubkriteriaKapasitasMesin($idPerhitungan, $data);

            $product = $this->calculateAllProduk($idPerhitungan);

            // dd($product);

            //Sortir Product

            DB::commit();
            
            return view('landing_page.page-hasil', compact('product'));
            
        } catch (Exception $e) {

            DB::rollback();
            // dd($e);
            throw $e;
        }
        
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
        // dd($getSubrkiteriaHarga);

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
        // dd($product);

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
                
                    // dump($gsk->operator, $tipe);
                     
                //     switch ($gsk->operator) {
                //         case '<':
                //             // dump(empty($key[$valueVariable]), 'id : '.$gsk->id);
                //             if($tipe == 'tahun_produksi'  ){
                //                 $totalTahun = date('Y') - $key[$tipe];
                //                 if($totalTahun < $gsk->nilai_pembanding ){
                //                     $key[$valueVariable] = $gsk->nama_subkriteria;
                //                     $key['id_'.$valueVariable] = $gsk->id;
                //                     // dump($totalTahun, $gsk->nama_subkriteria); 
                //                 }

                //             }else{
                //                 if($key[$tipe] < $gsk->nilai_pembanding ){
                //                     $key[$valueVariable] = $gsk->nama_subkriteria;
                //                     $key['id_'.$valueVariable] = $gsk->id;
                //                     // dump($gsk->nama_subkriteria); 

                //                 }
                //             }
                //             break;
                //         case '>':
                //             // dump($key[$valueVariable], $tipe, $gsk->operator);
                //             if($tipe == 'tahun_produksi'){
                //                 $totalTahun = date('Y') - $key[$tipe];
                //                 if($totalTahun > $gsk->nilai_pembanding){
                //                     $key[$valueVariable] = $gsk->nama_subkriteria;
                //                     $key['id_'.$valueVariable] = $gsk->id;
                                
                //                 }
                                
                //             }else{
                //                 // if(empty($key[$valueVariable])){
                //                 //     dump($tipe, $gsk->nama_subkriteria, $key[$tipe] > $gsk->nilai_pembanding, empty($key[$valueVariable])); 
                //                     if($key[$tipe] > $gsk->nilai_pembanding ){
                //                         $key[$valueVariable] = $gsk->nama_subkriteria;
                //                         $key['id_'.$valueVariable] = $gsk->id;
                //                     }
                //                 // }

                //             }
                            
                            
                //             break;
                //         case '<=':
                //             // dump($gsk->operator);
                //             if($tipe == 'tahun_produksi'){
                //                 $totalTahun = date('Y') - $key[$tipe];
                //                 if($totalTahun <= $gsk->nilai_pembanding){
                //                     $key[$valueVariable] = $gsk->nama_subkriteria;
                //                     $key['id_'.$valueVariable] = $gsk->id;
                //                 } 
                //             }else{
                //                 if($key[$tipe] <= $gsk->nilai_pembanding){
                //                     $key[$valueVariable] = $gsk->nama_subkriteria;
                //                     $key['id_'.$valueVariable] = $gsk->id;
                //                 }

                //             }
                //             $key['id_'.$valueVariable] = $gsk->id;
                            
                //             break;
                //         case '>=':
                //             // dump($gsk->operator);
                //             if($tipe == 'tahun_produksi'){
                //                 $totalTahun = date('Y') - $key[$tipe];
                //                 if($totalTahun >= $gsk->nilai_pembanding){
                //                     $key[$valueVariable] = $gsk->nama_subkriteria;
                //                     $key['id_'.$valueVariable] = $gsk->id;
                //                 } 
                //             }else{
                //                 if($key[$tipe] >= $gsk->nilai_pembanding){
                //                     $key[$valueVariable] = $gsk->nama_subkriteria;
                //                     $key['id_'.$valueVariable] = $gsk->id;
                //                 }

                //             }
                            
                //             break;
                        
                //         default:
                            
                //             break;
                //     }
        }
        return $key;
    }

    private function calculateSubkriteriaKapasitasMesin($idPerhitungan, $data) {
        //SUBKRITERIA KAPASITAS MESIN
            $idKriteria = Kriteria::where('nama_kriteria','LIKE', '%kapasitas%')->first()->id;
            $getSubkriteria = Subkriteria::where('id_kriteria', $idKriteria)->get();
            // dd($getSubkriteria);
            foreach ($data as $key => $value) {
                $array = preg_split('/(\d+)/', $key, -1, PREG_SPLIT_DELIM_CAPTURE);
                
                if($array[0] == 'kps'){
                    // dd($array);
                    //PERHITUNGAN TOTAL SUBKRITERIA KAPASITAS MESIN
                    switch ($array[1]) {
                        case '12':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[0]->id;
                            $idSub2 = $getSubkriteria[1]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '21':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[1]->id;
                            $idSub2 = $getSubkriteria[0]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '13':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[0]->id;
                            $idSub2 = $getSubkriteria[2]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '31':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[2]->id;
                            $idSub2 = $getSubkriteria[0]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                        
                            break;
                        case '23':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[1]->id;
                            $idSub2 = $getSubkriteria[2]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '32':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[2]->id;
                            $idSub2 = $getSubkriteria[1]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        
                        
                        default:
                            # code...
                            break;
                    }
                }

            }

            //PERHITUNGAN TOTAL SUBKRITERIA KAPASITAS MESIN
            $cekBobotSubkriteria = BobotSubkriteria::where('id_subkriteria', $getSubkriteria[0]->id)
                                            ->where('id_subkriteria_tujuan', $getSubkriteria[0]->id)
                                            ->where('id_perhitungan', $idPerhitungan)
                                            ->first();
            if($cekBobotSubkriteria === null){
                foreach ($getSubkriteria as $key) {
                    $inputBobot1 = [
                        'id_kriteria' => $idKriteria,
                        'id_perhitungan' => $idPerhitungan,
                        'id_subkriteria' => $key->id,
                        'id_subkriteria_tujuan' => $key->id,
                        'bobot_subkriteria' => 1
                    ];
                    $createBobotKriteria1 = MainController::store(BobotSubkriteria::class, $inputBobot1);

                    $totalBobotSubkriteria = BobotSubkriteria::where('id_perhitungan', $idPerhitungan)
                                    ->where('id_subkriteria_tujuan', $key->id)
                                    ->sum('bobot_subkriteria');
                    $updateKriteria = BobotSubkriteria::where('id_subkriteria', $key->id)
                                            ->where('id_subkriteria_tujuan', $key->id)
                                            ->where('id_perhitungan', $idPerhitungan)
                                            ->update(['total_subkriteria'=>$totalBobotSubkriteria]);
                }
            }

            //PERHITUNGAN TABEL 2 MATRIKS SUBKRITERIA KAPASITAS MESIN
            for ($i=0; $i <  count($getSubkriteria); $i++) {
                

                for ($j=0; $j < count($getSubkriteria); $j++) { 
                    
                    $subkriteriTotal = BobotSubKriteria::where('id_subkriteria', $getSubkriteria[$j]->id)
                                        ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                        ->first('total_subkriteria');
                
                    $bobotSubkriteria = BobotSubkriteria::where('id_subkriteria', $getSubkriteria[$i]->id)
                                ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                ->first('bobot_subkriteria');
                    $matriksSubkriteria =$bobotSubkriteria->bobot_subkriteria/$subkriteriTotal->total_subkriteria;
                    $bobotSubkriteria2 = ['bobot_subkriteria2' => round($matriksSubkriteria, 6)];


                    //update bobot ka 2
                    BobotSubkriteria::where('id_subkriteria', $getSubkriteria[$i]->id)
                                ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                ->update($bobotSubkriteria2);
                }

            }

            // PERHITUNGAN JUMLAH MATRIKS TIAP KRITERIA 
            for ($i=0; $i < count($getSubkriteria); $i++) {
                $idSubkriteria = $getSubkriteria[$i]->id;
                $getTotalSubkriteria = BobotSubkriteria::where('id_subkriteria', $idSubkriteria)
                            ->where('id_subkriteria_tujuan', $idSubkriteria)
                            ->first('total_subkriteria')
                            ->total_subkriteria;
                $getJumlahBySubKriteria = BobotSubkriteria::where('id_subkriteria', $idSubkriteria )
                                        ->where('id_perhitungan', $idPerhitungan)
                                        ->sum('bobot_subkriteria2');
                $prioritasSubriteria = $getJumlahBySubKriteria/count($getSubkriteria);
                $eigenValueSubkriteria = $prioritasSubriteria*$getTotalSubkriteria;

                // dd($getJumlahBySubKriteria, $eigenValueSubkriteria, $prioritasSubriteria);
                $updateKriteriaSummary = SubKriteriaSummary::create([
                    'id_kriteria' => $idKriteria,
                    'id_subkriteria' => $idSubkriteria,
                    'id_perhitungan' => $idPerhitungan,
                    'jumlah' => $getJumlahBySubKriteria,
                    'prioritas' => $prioritasSubriteria,
                    'eigen_value' => $eigenValueSubkriteria
                ]);
            }

            //UPDATE PERHITUNGAN : TOTAL EIGEN, RATIO INDEX, CR

            $getTotalEigenKriteria = SubkriteriaSummary::where('id_perhitungan', $idPerhitungan)
                             ->where('id_kriteria', $idKriteria)
                             ->sum('eigen_value');
            $ratioIndex = $this->handleRatioIndex(count($getSubkriteria));
            $consistencyIndex = ($getTotalEigenKriteria - count($getSubkriteria))/(count($getSubkriteria)-1);
            $consistencyRatio = $consistencyIndex/$ratioIndex;

            $updatePerhitungan = SubkriteriaSummary::where('id_perhitungan', $idPerhitungan)
                                ->where('id_kriteria', $idKriteria)
                                 ->update([
                                    'total_eigen' => round($getTotalEigenKriteria, 6),
                                    'ratio_index' => $ratioIndex,
                                    'cr' => round($consistencyRatio, 6)
                                 ]);
            // dd($ratioIndex, $consistencyIndex, $consistencyRatio, $idPerhitungan, $idKriteria);
    
        
    }

    private function calculateSubkriteriaTahun($idPerhitungan, $data) {
        //SUBKRITERIA TAHUN
            $idKriteria = Kriteria::where('nama_kriteria','LIKE', '%tahun%')->first()->id;
            $getSubkriteria = Subkriteria::where('id_kriteria', $idKriteria)->get();
            // dd($getSubkriteria);
            foreach ($data as $key => $value) {
                $array = preg_split('/(\d+)/', $key, -1, PREG_SPLIT_DELIM_CAPTURE);
                
                if($array[0] == 't'){
                    // dd($array);
                    //PERHITUNGAN TOTAL SUBKRITERIA TAHUN
                    switch ($array[1]) {
                        case '12':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[0]->id;
                            $idSub2 = $getSubkriteria[1]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '21':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[1]->id;
                            $idSub2 = $getSubkriteria[0]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '13':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[0]->id;
                            $idSub2 = $getSubkriteria[2]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '31':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[2]->id;
                            $idSub2 = $getSubkriteria[0]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                        
                            break;
                        case '23':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[1]->id;
                            $idSub2 = $getSubkriteria[2]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '32':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[2]->id;
                            $idSub2 = $getSubkriteria[1]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteria,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteria,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        
                        
                        default:
                            # code...
                            break;
                    }
                }

            }

            //PERHITUNGAN TOTAL SUBKRITERIA TAHUN
            $cekBobotSubkriteria = BobotSubkriteria::where('id_subkriteria', $getSubkriteria[0]->id)
                                            ->where('id_subkriteria_tujuan', $getSubkriteria[0]->id)
                                            ->where('id_perhitungan', $idPerhitungan)
                                            ->first();
            if($cekBobotSubkriteria === null){
                foreach ($getSubkriteria as $key) {
                    $inputBobot1 = [
                        'id_kriteria' => $idKriteria,
                        'id_perhitungan' => $idPerhitungan,
                        'id_subkriteria' => $key->id,
                        'id_subkriteria_tujuan' => $key->id,
                        'bobot_subkriteria' => 1
                    ];
                    $createBobotKriteria1 = MainController::store(BobotSubkriteria::class, $inputBobot1);

                    $totalBobotSubkriteria = BobotSubkriteria::where('id_perhitungan', $idPerhitungan)
                                    ->where('id_subkriteria_tujuan', $key->id)
                                    ->sum('bobot_subkriteria');
                    $updateKriteria = BobotSubkriteria::where('id_subkriteria', $key->id)
                                            ->where('id_subkriteria_tujuan', $key->id)
                                            ->where('id_perhitungan', $idPerhitungan)
                                            ->update(['total_subkriteria'=>$totalBobotSubkriteria]);
                }
            }

            //PERHITUNGAN TABEL 2 MATRIKS SUBKRITERIA TAHUN
            for ($i=0; $i <  count($getSubkriteria); $i++) {
                

                for ($j=0; $j < count($getSubkriteria); $j++) { 
                    
                    $subkriteriTotal = BobotSubKriteria::where('id_subkriteria', $getSubkriteria[$j]->id)
                                        ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                        ->first('total_subkriteria');
                
                    $bobotSubkriteria = BobotSubkriteria::where('id_subkriteria', $getSubkriteria[$i]->id)
                                ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                ->first('bobot_subkriteria');
                    $matriksSubkriteria =$bobotSubkriteria->bobot_subkriteria/$subkriteriTotal->total_subkriteria;
                    $bobotSubkriteria2 = ['bobot_subkriteria2' => round($matriksSubkriteria, 6)];


                    //update bobot ka 2
                    BobotSubkriteria::where('id_subkriteria', $getSubkriteria[$i]->id)
                                ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                ->update($bobotSubkriteria2);
                }

            }

            // PERHITUNGAN JUMLAH MATRIKS TIAP KRITERIA 
            for ($i=0; $i < count($getSubkriteria)   ; $i++) {
                $idSubkriteria = $getSubkriteria[$i]->id;
                $getTotalSubkriteria = BobotSubkriteria::where('id_subkriteria', $idSubkriteria)
                            ->where('id_subkriteria_tujuan', $idSubkriteria)
                            ->first('total_subkriteria')
                            ->total_subkriteria;
                $getJumlahBySubKriteria = BobotSubkriteria::where('id_subkriteria', $idSubkriteria )
                                        ->where('id_perhitungan', $idPerhitungan)
                                        ->sum('bobot_subkriteria2');
                $prioritasSubriteria = $getJumlahBySubKriteria/count($getSubkriteria);
                $eigenValueSubkriteria = $prioritasSubriteria*$getTotalSubkriteria;

                // dd($getJumlahBySubKriteria, $eigenValueSubkriteria, $prioritasSubriteria);
                $updateKriteriaSummary = SubKriteriaSummary::create([
                    'id_kriteria' => $idKriteria,
                    'id_subkriteria' => $idSubkriteria,
                    'id_perhitungan' => $idPerhitungan,
                    'jumlah' => $getJumlahBySubKriteria,
                    'prioritas' => $prioritasSubriteria,
                    'eigen_value' => $eigenValueSubkriteria
                ]);
            }

            //UPDATE PERHITUNGAN : TOTAL EIGEN, RATIO INDEX, CR

            $getTotalEigenKriteria = SubkriteriaSummary::where('id_perhitungan', $idPerhitungan)
                             ->where('id_kriteria', $idKriteria)
                             ->sum('eigen_value');
            $ratioIndex = $this->handleRatioIndex(count($getSubkriteria));
            $consistencyIndex = ($getTotalEigenKriteria - count($getSubkriteria))/(count($getSubkriteria)-1);
            $consistencyRatio = $consistencyIndex/$ratioIndex;

            $updatePerhitungan = SubkriteriaSummary::where('id_perhitungan', $idPerhitungan)
                                ->where('id_kriteria', $idKriteria)
                                 ->update([
                                    'total_eigen' => round($getTotalEigenKriteria, 6),
                                    'ratio_index' => $ratioIndex,
                                    'cr' => round($consistencyRatio, 6)
                                 ]);
            // dd($ratioIndex, $consistencyIndex, $consistencyRatio, $idPerhitungan, $idKriteria);
    
        
    }

    private function calculateSubkriteriaHarga($idPerhitungan, $data) {
        //SUBKRITERIA HARGA
            $idKriteriaHarga = Kriteria::where('nama_kriteria','LIKE', '%harga')->first()->id;
            $getSubkriteria = Subkriteria::where('id_kriteria', $idKriteriaHarga)->get();
            
            
            foreach ($data as $key => $value) {
                $array = preg_split('/(\d+)/', $key, -1, PREG_SPLIT_DELIM_CAPTURE);
                // dd($array, $data);
                if($array[0] == 'h'){
                    
                    //PERHITUNGAN TOTAL SUBKRITERIA HARGA
                    switch ($array[1]) {
                        case '12':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[0]->id;
                            $idSub2 = $getSubkriteria[1]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteriaHarga,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteriaHarga,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            // dd($dataBobot);
                            
                            break;
                        case '21':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[1]->id;
                            $idSub2 = $getSubkriteria[0]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteriaHarga,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteriaHarga,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '13':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[0]->id;
                            $idSub2 = $getSubkriteria[2]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteriaHarga,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteriaHarga,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '31':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[2]->id;
                            $idSub2 = $getSubkriteria[0]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteriaHarga,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteriaHarga,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                        
                            break;
                        case '23':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[1]->id;
                            $idSub2 = $getSubkriteria[2]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteriaHarga,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteriaHarga,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        case '32':
                            $sub1 = $value;
                            $sub2 = 1/$value;
                            $idSub1 = $getSubkriteria[2]->id;
                            $idSub2 = $getSubkriteria[1]->id;

                            $dataBobot = [ 
                                [
                                    'id_kriteria' => $idKriteriaHarga,
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub1,
                                    'id_subkriteria_tujuan' => $idSub2,
                                    'bobot_subkriteria' => $sub1,
                                ],
                                [
                                    'id_perhitungan' => $idPerhitungan,
                                    'id_subkriteria' => $idSub2,
                                    'id_subkriteria_tujuan' => $idSub1,
                                    'bobot_subkriteria' => $sub2,
                                    'id_kriteria' => $idKriteriaHarga,
                                ]
                            ];
                            
                            $createBobotSubKriteria1 = BobotSubkriteria::insert($dataBobot);
                            
                            break;
                        
                        
                        default:
                            # code...
                            break;
                    }
                }

            }

            //PERHITUNGAN TOTAL SUBKRITERIA HARGA
            $cekBobotSubkriteria = BobotSubkriteria::where('id_subkriteria', $getSubkriteria[0]->id)
                                            ->where('id_subkriteria_tujuan', $getSubkriteria[0]->id)
                                            ->where('id_perhitungan', $idPerhitungan)
                                            ->first();
            if($cekBobotSubkriteria === null){
                foreach ($getSubkriteria as $key) {
                    $inputBobot1 = [
                        'id_kriteria' => $idKriteriaHarga,
                        'id_perhitungan' => $idPerhitungan,
                        'id_subkriteria' => $key->id,
                        'id_subkriteria_tujuan' => $key->id,
                        'bobot_subkriteria' => 1
                    ];
                    $createBobotKriteria1 = MainController::store(BobotSubkriteria::class, $inputBobot1);

                    $totalBobotSubkriteria = BobotSubkriteria::where('id_perhitungan', $idPerhitungan)
                                    ->where('id_subkriteria_tujuan', $key->id)
                                    ->sum('bobot_subkriteria');
                    $updateKriteria = BobotSubkriteria::where('id_subkriteria', $key->id)
                                            ->where('id_subkriteria_tujuan', $key->id)
                                            ->where('id_perhitungan', $idPerhitungan)
                                            ->update(['total_subkriteria'=>$totalBobotSubkriteria]);
                }
            }

            //PERHITUNGAN TABEL 2 MATRIKS SUBKRITERIA HARGA
            for ($i=0; $i <  count($getSubkriteria); $i++) {
                

                for ($j=0; $j < count($getSubkriteria); $j++) { 
                    
                    $subkriteriTotal = BobotSubKriteria::where('id_subkriteria', $getSubkriteria[$j]->id)
                                        ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                        ->first('total_subkriteria');
                
                    $bobotSubkriteria = BobotSubkriteria::where('id_subkriteria', $getSubkriteria[$i]->id)
                                ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                ->first('bobot_subkriteria');
                    // $test =         BobotSubkriteria::all();
                    // dd($test);
                    
                    $matriksSubkriteria = $bobotSubkriteria->bobot_subkriteria/$subkriteriTotal->total_subkriteria;
                    $bobotSubkriteria2 = ['bobot_subkriteria2' => round($matriksSubkriteria, 6)];


                    //update bobot ka 2
                    BobotSubkriteria::where('id_subkriteria', $getSubkriteria[$i]->id)
                                ->where('id_subkriteria_tujuan', $getSubkriteria[$j]->id)
                                ->update($bobotSubkriteria2);
                }

            }

            // PERHITUNGAN JUMLAH MATRIKS TIAP KRITERIA 
            for ($i=0; $i < count($getSubkriteria)   ; $i++) {
                $idSubkriteria = $getSubkriteria[$i]->id;
                $getTotalSubkriteria = BobotSubkriteria::where('id_subkriteria', $idSubkriteria)
                            ->where('id_subkriteria_tujuan', $idSubkriteria)
                            ->first('total_subkriteria')
                            ->total_subkriteria;
                $getJumlahBySubKriteria = BobotSubkriteria::where('id_subkriteria', $idSubkriteria )
                                        ->where('id_perhitungan', $idPerhitungan)
                                        ->sum('bobot_subkriteria2');
                $prioritasSubriteria = $getJumlahBySubKriteria/count($getSubkriteria);
                $eigenValueSubkriteria = $prioritasSubriteria*$getTotalSubkriteria;

                // dd($getJumlahBySubKriteria, $eigenValueSubkriteria, $prioritasSubriteria);
                $updateKriteriaSummary = SubKriteriaSummary::create([
                    'id_kriteria' => $idKriteriaHarga,
                    'id_subkriteria' => $idSubkriteria,
                    'id_perhitungan' => $idPerhitungan,
                    'jumlah' => $getJumlahBySubKriteria,
                    'prioritas' => $prioritasSubriteria,
                    'eigen_value' => $eigenValueSubkriteria
                ]);
            }

            //UPDATE PERHITUNGAN : TOTAL EIGEN, RATIO INDEX, CR

            $getTotalEigenKriteria = SubkriteriaSummary::where('id_perhitungan', $idPerhitungan)
                                ->where('id_kriteria', $idKriteriaHarga)
                             ->sum('eigen_value');
            $ratioIndex = $this->handleRatioIndex(count($getSubkriteria));
            $consistencyIndex = ($getTotalEigenKriteria - count($getSubkriteria))/(count($getSubkriteria)-1);
            $consistencyRatio = $consistencyIndex/$ratioIndex;
            // dd($ratioIndex, $consistencyIndex, $consistencyRatio, $idPerhitungan, $idKriteriaHarga);
            $updatePerhitungan = SubkriteriaSummary::where('id_perhitungan', $idPerhitungan)
                                ->where('id_kriteria', $idKriteriaHarga)
                                 ->update([
                                    'total_eigen' => round($getTotalEigenKriteria, 6),
                                    'ratio_index' => $ratioIndex,
                                    'cr' => round($consistencyRatio, 6)
                                 ]);
    
        
    }

    private function calculateKriteria($idPerhitungan, $request) {
        //perhitungan kriteria
            //Harga -> Tahun
            if($request->input('kriteria12') !== null){
                $kriteria12 = $request->kriteria12;
                $kriteria21 = 1/$kriteria12;
                $getIdKriteria1 = Kriteria::where('nama_kriteria','LIKE', '%harga')->first()->id;
                $getIdKriteria2 = Kriteria::where('nama_kriteria','LIKE', '%tahun%')->first()->id;

                //create bobot kriteria Harga
                $inputBobot1 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria1,
                    'id_kriteria_tujuan' => $getIdKriteria2,
                    'bobot_kriteria' => $kriteria12,
                    // 'bobot_kriteria2' => $kriteria21
                ];
                $inputBobot2 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria2,
                    'id_kriteria_tujuan' => $getIdKriteria1,
                    'bobot_kriteria' => $kriteria21,
                    // 'bobot_kriteria2' => $kriteria12
                ];

                $createBobotKriteria1 = MainController::store(BobotKriteria::class, $inputBobot1);
                $createBobotKriteria2 = MainController::store(BobotKriteria::class, $inputBobot2);
                // dd($createBobotKriteria1);

            }

            //Tahun -> Harga
            if($request->input('kriteria21') !== null){
                $kriteria21 = $request->kriteria21;
                $kriteria12 = 1/$kriteria21;
                $getIdKriteria1 = Kriteria::where('nama_kriteria','LIKE', '%tahun%')->first()->id;
                $getIdKriteria2 = Kriteria::where('nama_kriteria','LIKE', '%harga%')->first()->id;

                //create bobot kriteria Tahun
                $inputBobot1 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria1,
                    'id_kriteria_tujuan' => $getIdKriteria2,
                    'bobot_kriteria' => $kriteria21,
                    // 'bobot_kriteria2' => $kriteria12
                ];

                $inputBobot2 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria2,
                    'id_kriteria_tujuan' => $getIdKriteria1,
                    'bobot_kriteria' => $kriteria12,
                    // 'bobot_kriteria2' => $kriteria21
                ];

                $createBobotKriteria1 = MainController::store(BobotKriteria::class, $inputBobot1);
                $createBobotKriteria2 = MainController::store(BobotKriteria::class, $inputBobot2);
            }

            // Harga -> Kapasitas Mesin
            if($request->input('kriteria13') !== null){
                $kriteria13 = $request->kriteria13;
                $kriteria31 = 1/$kriteria13;
                $getIdKriteria1 = Kriteria::where('nama_kriteria','LIKE', '%harga%')->first()->id;
                $getIdKriteria2 = Kriteria::where('nama_kriteria','LIKE', '%kapasitas%')->first()->id;

                //create bobot kriteria Harga
                $inputBobot1 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria1,
                    'id_kriteria_tujuan' => $getIdKriteria2,
                    'bobot_kriteria' => $kriteria13,
                    // 'bobot_kriteria2' => $kriteria31
                ];

                $inputBobot2 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria2,
                    'id_kriteria_tujuan' => $getIdKriteria1,
                    'bobot_kriteria' => $kriteria31,
                    // 'bobot_kriteria2' => $kriteria13
                ];

                $createBobotKriteria1 = MainController::store(BobotKriteria::class, $inputBobot1);
                $createBobotKriteria2 = MainController::store(BobotKriteria::class, $inputBobot2);
            }

            //Kapasitas Mesin -> Harga
            if($request->input('kriteria31') !== null){
                $kriteria31 = $request->kriteria31;
                $kriteria13 = 1/$kriteria31;

                $getIdKriteria1 = Kriteria::where('nama_kriteria','LIKE', '%kapasitas%')->first()->id;
                $getIdKriteria2 = Kriteria::where('nama_kriteria','LIKE', '%harga')->first()->id;

                //create bobot kriteria Harga
                $inputBobot1 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria1,
                    'id_kriteria_tujuan' => $getIdKriteria2,
                    'bobot_kriteria' => $kriteria31,
                    // 'bobot_kriteria2' => $kriteria13
                ];

                $inputBobot2 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria2,
                    'id_kriteria_tujuan' => $getIdKriteria1,
                    'bobot_kriteria' => $kriteria13,
                    // 'bobot_kriteria2' => $kriteria31
                ];

                $createBobotKriteria1 = MainController::store(BobotKriteria::class, $inputBobot1);
                $createBobotKriteria2 = MainController::store(BobotKriteria::class, $inputBobot2);
            }

            // Kapasitas Mesin -> Tahun
            if($request->input('kriteria23') !== null){
                $kriteria23 = $request->kriteria23;
                $kriteria32 = 1/$kriteria23;

                $getIdKriteria1 = Kriteria::where('nama_kriteria','LIKE', '%kapasitas%')->first()->id;
                $getIdKriteria2 = Kriteria::where('nama_kriteria','LIKE', '%tahun%')->first()->id;

                //create bobot kriteria Harga
                $inputBobot1 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria1,
                    'id_kriteria_tujuan' => $getIdKriteria2,
                    'bobot_kriteria' => $kriteria23,
                    // 'bobot_kriteria2' => $kriteria32
                ];
                $inputBobot2 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria2,
                    'id_kriteria_tujuan' => $getIdKriteria1,
                    'bobot_kriteria' => $kriteria32,
                    // 'bobot_kriteria2' => $kriteria23
                ];

                $createBobotKriteria1 = MainController::store(BobotKriteria::class, $inputBobot1);
                $createBobotKriteria2 = MainController::store(BobotKriteria::class, $inputBobot2);
            }


            // Tahun -> Kapasitas Mesin
            if($request->input('kriteria32') !== null){
                $kriteria32 = $request->kriteria32;
                $kriteria23 = 1/$kriteria32;

                $getIdKriteria1 = Kriteria::where('nama_kriteria','LIKE', '%tahun%')->first()->id;
                $getIdKriteria2 = Kriteria::where('nama_kriteria','LIKE', '%kapasitas%')->first()->id;

                //create bobot kriteria Harga
                $inputBobot1 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria1,
                    'id_kriteria_tujuan' => $getIdKriteria2,
                    'bobot_kriteria' => $kriteria32,
                    // 'bobot_kriteria2' => $kriteria23
                ];

                $inputBobot2 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $getIdKriteria2,
                    'id_kriteria_tujuan' => $getIdKriteria1,
                    'bobot_kriteria' => $kriteria23,
                    // 'bobot_kriteria2' => $kriteria32
                ];

                $createBobotKriteria1 = MainController::store(BobotKriteria::class, $inputBobot1);
                $createBobotKriteria2 = MainController::store(BobotKriteria::class, $inputBobot2);
                // dd($createBobotKriteria1, $createBobotKriteria2);
            }

            $getAllKriteria = DB::table('kriterias')->get();
            $totalDataKriteria = count($getAllKriteria);
            foreach ($getAllKriteria as $key) {
                $inputBobot1 = [
                    'id_perhitungan' => $idPerhitungan,
                    'id_kriteria' => $key->id,
                    'id_kriteria_tujuan' => $key->id,
                    'bobot_kriteria' => 1,
                    // 'bobot_kriteria2' => 1
                ];
                $createBobotKriteria1 = MainController::store(BobotKriteria::class, $inputBobot1);

                $totalBobotHarga = BobotKriteria::where('id_perhitungan', $idPerhitungan)
                                ->where('id_kriteria_tujuan', $key->id)
                                ->sum('bobot_kriteria');
                $updateKriteria = BobotKriteria::where('id_kriteria', $key->id)
                                        ->where('id_perhitungan', $idPerhitungan)
                                        ->where('id_kriteria_tujuan', $key->id)
                                        ->update(['total'=>$totalBobotHarga]);
            }


            //PERHITUNGAN TABEL 2 MATRIKS KRITERIA
            for ($i=0; $i < $totalDataKriteria; $i++) {
                

                for ($j=0; $j < $totalDataKriteria ; $j++) { 
                    
                    $kriteriaTotal = BobotKriteria::where('id_kriteria', $getAllKriteria[$j]->id)
                                        ->where('id_kriteria_tujuan', $getAllKriteria[$j]->id)
                                        ->where('id_perhitungan', $idPerhitungan)
                                        ->first('total');
                
                    $bobotKriteria = BobotKriteria::where('id_kriteria', $getAllKriteria[$i]->id)
                                ->where('id_kriteria_tujuan', $getAllKriteria[$j]->id)
                                ->where('id_perhitungan', $idPerhitungan)
                                ->first(['bobot_kriteria','id_kriteria','id_kriteria_tujuan']);
                    // dump($bobotKriteria);
                    $matriksKriteria =$bobotKriteria->bobot_kriteria/$kriteriaTotal->total;
                    $bobotKriteria2 = ['bobot_kriteria2' => round($matriksKriteria, 6)];


                    //update bobot ka 2
                    BobotKriteria::where('id_kriteria', $getAllKriteria[$i]->id)
                                ->where('id_perhitungan', $idPerhitungan)
                                ->where('id_kriteria_tujuan', $getAllKriteria[$j]->id)
                                ->update($bobotKriteria2);
                }

            }
                                     
            
            // PERHITUNGAN JUMLAH MATRIKS TIAP KRITERIA 
            for ($i=0; $i < $totalDataKriteria   ; $i++) {
                $idKriteria = $getAllKriteria[$i]->id;
                $getTotalKriteria = BobotKriteria::where('id_kriteria', $idKriteria)
                            ->where('id_kriteria_tujuan', $idKriteria)
                            ->first('total')
                            ->total;
                $getJumlahByKriteria = BobotKriteria::where('id_kriteria', $idKriteria )
                                        ->where('id_perhitungan', $idPerhitungan)
                                        ->sum('bobot_kriteria2');
                $prioritasKriteria = $getJumlahByKriteria/$totalDataKriteria;
                $eigenValue = $prioritasKriteria*$getTotalKriteria;

                // dd($getJumlahByKriteria, $eigenValue, $prioritasKriteria);
                $updateKriteriaSummary = KriteriaSummary::create([
                    'id_kriteria' => $idKriteria,
                    'id_perhitungan' => $idPerhitungan,
                    'jumlah' => $getJumlahByKriteria,
                    'prioritas' => $prioritasKriteria,
                    'eigen_value' => $eigenValue
                ]);
            }


            //UPDATE PERHITUNGAN : TOTAL EIGEN, RATIO INDEX, CR

            $getTotalEigenKriteria = KriteriaSummary::where('id_perhitungan', $idPerhitungan)
                             ->sum('eigen_value');
            $ratioIndex = $this->handleRatioIndex($totalDataKriteria);
            $consistencyIndex = ($getTotalEigenKriteria - $totalDataKriteria)/($totalDataKriteria-1);
            $consistencyRatio = $consistencyIndex/$ratioIndex;

            $updatePerhitungan = Perhitungan::where('id', $idPerhitungan)
                                 ->update([
                                    'total_eigen' => round($getTotalEigenKriteria, 6),
                                    'ratio_index' => $ratioIndex,
                                    'consistency_ratio' => round($consistencyRatio, 6)
                                 ]);
        
    }

    public function handleRatioIndex($totalData){
        switch ($totalData) {
            case 3:
                return 0.58;
            case 4:
                return 0.90;
            case 5:
                return 1.12;
            case 6:
                return 1.24;
            case 7:
                return 1.32;
            case 8:
                return 1.41;
            case 9:
                return 1.45;
            case 10:
                return 1.49;
            case 11:
                return 1.51;
            case 12:
                return 1.48;
            case 13:
                return 1.56;
            case 14:
                return 1.57;
            case 15:
                return 1.58;
            default:
                return 0.0;
        }
    }
}
 