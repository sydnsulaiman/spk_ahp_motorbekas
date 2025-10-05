<!DOCTYPE html>
<html>

@include('landing_page.head')

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('landing_page.header')
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="slider_container">
        <div class="img-box">
          <img src="{{ asset('template_showroom/images/hero-img2.png') }}" alt="">
        </div>
        <div class="detail_container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="detail-box">
                  <h1>
                     BINGUNG </br> PILIH MOTOR?  <br>
                    BIARKAN SISTEM </br>
                     YANG BANTU

                  </h1>
                  <a href="#perhitungan">
                    Mulai Sekarang
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                  <h1>
                    SPK 
                    <br>MOTOR 
                    BEKAS <br> TERPERCAYA
                  </h1>
                  <a href="#perhitungan">
                     Mulai Sekarang
                  </a>
                </div>
              </div>
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <!-- book section -->
  {{-- <section class="book_section">
    <div class="form_container">
      
      <form action="">
        <div class="form-row" style="justify-content: center">
          <div class="heading_container">
          <h2>
            Form Pencarian Motor Bekas
          </h2>
          <p>
           Mencari produk berdasarkan prioritas kategori yang anda pilih.
          </p>
          </div>
          <div class="col-lg-12">
            <div class="form-row">
              <div class="col-md-4">
                <label for="parkingName">Kriteria 1</label>
                <input type="text" class="form-control" name="kriteria1" placeholder="acb ">
                <h3>Harga</h3>
              </div>
              <div class="col-md-4">
                <label for="parkingNumber">Nilai Perbandingan</label>
                <select name="nilai_perbandingan1" id="" class="form-control">
                  <option selected disabled value="">Pilih nilai perbandingan </option>
                  <option value="1">Sama penting dengan <span>(1)</span></option>
                  <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                  <option value="3">Sedikit lebih penting dari (3)</option>
                  <option value="4">Mendekati lebih penting dari (4)</option>
                  <option value="5">Lebih penting dari (5)</option>
                  <option value="6">Mendekat sangat penting dari (6)</option>
                  <option value="7">Sangat Penting dari (7)</option>
                  <option value="8">Mendekati mutlak dari (8)</option>
                  <option value="9">Mutlak sangat penting dari (9)</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="parkingNumber">Kriteria 2</label>
                <input type="text" class="form-control" name="kriteria2" placeholder="acb ">
                <h3>Tahun Produksi</h3>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-4">
                <label for="parkingName">Kriteria 1</label>
                <input type="text" class="form-control" name="kriteria3" placeholder="acb ">
                <h3>Harga</h3>
              </div>
              <div class="col-md-4">
                <label for="parkingNumber">Nilai Perbandingan</label>
                <select name="nilai_perbandingan2" id="" class="form-control">
                  <option selected disabled value="">Pilih nilai perbandingan </option>
                  <option value="1">Sama penting dengan <span>(1)</span></option>
                  <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                  <option value="3">Sedikit lebih penting dari (3)</option>
                  <option value="4">Mendekati lebih penting dari (4)</option>
                  <option value="5">Lebih penting dari (5)</option>
                  <option value="6">Mendekat sangat penting dari (6)</option>
                  <option value="7">Sangat Penting dari (7)</option>
                  <option value="8">Mendekati mutlak dari (8)</option>
                  <option value="9">Mutlak sangat penting dari (9)</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="parkingNumber">Kriteria 2</label>
                <input type="text" class="form-control" name="kriteria4" placeholder="acb ">
                <h3>Kapasitas Mesin</h3>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4">
                <label for="parkingName">Kriteria 1</label>
                <input type="text" class="form-control" name="kriteria3" placeholder="acb ">
                <h3>Tahun</h3>
              </div>
              <div class="col-md-4">
                <label for="parkingNumber">Nilai Perbandingan</label>
                <select name="nilai_perbandingan2" id="" class="form-control">
                  <option selected disabled value="">Pilih nilai perbandingan </option>
                  <option value="1">Sama penting dengan <span>(1)</span></option>
                  <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                  <option value="3">Sedikit lebih penting dari (3)</option>
                  <option value="4">Mendekati lebih penting dari (4)</option>
                  <option value="5">Lebih penting dari (5)</option>
                  <option value="6">Mendekat sangat penting dari (6)</option>
                  <option value="7">Sangat Penting dari (7)</option>
                  <option value="8">Mendekati mutlak dari (8)</option>
                  <option value="9">Mutlak sangat penting dari (9)</option>
                </select>
              </div>
              <div class="col-md-4">
                <label for="parkingNumber">Kriteria 2</label>
                <input type="text" class="form-control" name="kriteria4" placeholder="acb ">
                <h3>Kapasitas Mesin</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="btn-container" style="justify-content: flex-start">
              <button type="submit" class="">
                Search
              </button>
            </div>
          </div>
        </div>

      </form>
    </div>
    <div class="img-box">
      <img src="{{ asset('template_showroom/images/book-car.png') }}" alt="">
    </div>
  </section> --}}

  <section id="perhitungan">
    <div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-md-8">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Form Pencarian Motor Bekas</strong></h2>
                <p>Mencari produk berdasarkan prioritas kategori yang anda pilih.</p>
                <div class="row">
                    <div class="col-md-12">
                        <form id="msform" action="{{ route('home.post.bobot') }}" method="POST" >
                            @csrf
                            <!-- progressbar -->
                            <ul id="progressbar" style="display: flex;justify-content: center">
                                <li class="active" id="account"><strong>Prioritas Kriteria</strong></li>
                                <li id="personal"><strong>Harga</strong></li>
                                <li id="personal"><strong>Tahun</strong></li>
                                <li id="personal"><strong>Kapasitas Mesin</strong></li>
                                <li id="confirm">
                                  <strong>Done</strong>
                                </li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="col-lg-12 form-card">
                                  <div class="form-row" >
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingName">Kriteria 1</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria1" placeholder="acb "> --}}
                                      <h3 id="k1">Harga</h3>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <select name="kriteria12" id="pk1" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span style="font-weight: bold;">(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}

                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingNumber">Kriteria 2</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria2" placeholder="acb "> --}}
                                      <h3 id="k2"> Tahun Produksi</h3>

                                      <button onclick="tukar(1)" type="button" class="btn btn-success rounded-pill" style="width: 25%; margin-left:5%" ><i class="fa fa-refresh"></i></button>
                                    </div>
                                  </div>

                                  <div class="form-row mt-4" style="justify-content: center;align-items: center">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingName">Kriteria 1</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria3" placeholder="acb "> --}}
                                      <h3 id="k3">Harga</h3>
                                    </div>
                                    <div class="col-md-4">
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}
                                      <select name="kriteria13" id="pk2" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingNumber">Kriteria 2</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria4" placeholder="acb "> --}}
                                      <h3 id="k4">Kapasitas Mesin</h3>

                                      <button onclick="tukar(2)" type="button" class="btn btn-success rounded-pill" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    </div>
                                  </div>
                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingName">Kriteria 1</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria3" placeholder="acb "> --}}
                                      <h3 id="k5">Kapasitas Mesin</h3>
                                    </div>
                                    <div class="col-md-4">
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}
                                      <select name="kriteria23" id="pk3" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <h3 id="k6">Tahun Produksi</h3>
                                      <button onclick="tukar(3)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    </div>
                                  </div>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>

                            {{-- HARGA --}}
                            <fieldset>
                                <div class="col-lg-12 form-card">
                                  <div class="form-row" >
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center" >
                                      
                                      <h3 id="k7">Ekonomis</h3>
                                    </div>
                                    <div class="col-md-4" >
                                      <select name="h12" id="pk4" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <h3 id="k8">Standart</h3>
                                      <button onclick="tukar(4)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    </div>
                                  </div>

                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <h3 id="k9">Ekonomis</h3>
                                    </div>
                                    <div class="col-md-4">
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}
                                      <select name="h13" id="pk5" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingNumber">Subkriteria 2</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria4" placeholder="acb "> --}}
                                      <h3 id="k10">Premium</h3>
                                      <button onclick="tukar(5)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingName">Subriteria 1</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria3" placeholder="acb "> --}}
                                      <h3 id="k11">Standart</h3>
                                    </div>
                                    <div class="col-md-4">
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}
                                      <select name="h23" id="pk6" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingNumber">Subkriteria 2</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria4" placeholder="acb "> --}}
                                      <h3 id="k12">Premium</h3>
                                      <button onclick="tukar(6)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            {{-- TAHUN --}}
                            
                            <fieldset>
                                <div class="col-lg-12 form-card">
                                  <div class="form-row" >
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center" >
                                      
                                      <h3 id="k13">Terbaru</h3>
                                    </div>
                                    <div class="col-md-4" >
                                      <select name="t12" id="pk7" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <h3 id="k14">Menengah</h3>
                                      <button onclick="tukar(7)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>

                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <h3 id="k15">Terbaru</h3>
                                    </div>
                                    <div class="col-md-4">
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}
                                      <select name="t13" id="pk8" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingNumber">Subkriteria 2</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria4" placeholder="acb "> --}}
                                      <h3 id="k16">Terlama</h3>
                                      <button onclick="tukar(8)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingName">Subriteria 1</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria3" placeholder="acb "> --}}
                                      <h3 id="k17">Menengah</h3>
                                    </div>
                                    <div class="col-md-4">
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}
                                      <select name="t23" id="pk9" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingNumber">Subkriteria 2</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria4" placeholder="acb "> --}}
                                      <h3 id="k18">Terlama</h3>
                                      <button onclick="tukar(9)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>

                            {{-- KAPASITAS MESIN --}}
                            <fieldset>
                                <div class="col-lg-12 form-card">
                                  <div class="form-row" >
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center" >
                                      
                                      <h3 id="k19">Kecil</h3>
                                    </div>
                                    <div class="col-md-4" >
                                      <select name="kps12" id="pk10" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <h3 id="k20">Menengah</h3>
                                      <button onclick="tukar(10)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>

                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <h3 id="k21">Kecil</h3>
                                    </div>
                                    <div class="col-md-4">
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}
                                      <select name="kps13" id="pk11" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingNumber">Subkriteria 2</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria4" placeholder="acb "> --}}
                                      <h3 id="k22">Besar</h3>
                                      <button onclick="tukar(11)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingName">Subriteria 1</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria3" placeholder="acb "> --}}
                                      <h3 id="k23">Menengah</h3>
                                    </div>
                                    <div class="col-md-4">
                                      {{-- <label for="parkingNumber">Nilai Perbandingan</label> --}}
                                      <select name="kps23" id="pk12" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan <span>(1)</span></option>
                                        <option value="2">Mendekati sedikit lebih penting dari (2)</option>
                                        <option value="3">Sedikit lebih penting dari (3)</option>
                                        <option value="4">Mendekati lebih penting dari (4)</option>
                                        <option value="5">Lebih penting dari (5)</option>
                                        <option value="6">Mendekat sangat penting dari (6)</option>
                                        <option value="7">Sangat Penting dari (7)</option>
                                        <option value="8">Mendekati mutlak dari (8)</option>
                                        <option value="9">Mutlak sangat penting dari (9)</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      {{-- <label for="parkingNumber">Subkriteria 2</label> --}}
                                      {{-- <input type="text" class="form-control" name="kriteria4" placeholder="acb "> --}}
                                      <h3 id="k24">Besar</h3>
                                      <button onclick="tukar(12)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button"  class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="col-lg-12 form-card">
                                  <h4>Pastikan data yang anda masukkan sudah sesuai!!</h4>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="submit"  class="next action-button" value="Submit"/>

                            </fieldset>
                            {{-- <fieldset>
                                <div class="col-lg-12 form-card">
                                  <h4>Pastikan data yang anda masukkan sudah sesuai</h4>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="submit" name="next" class="next action-button" value="Submit"/>
                            </fieldset> --}}
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  </section>

  <!-- end book section -->

  <!-- car section -->

  {{-- <section class="car_section layout_padding2-top layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Better Way For Find Your Favourite Cars
        </h2>
        <p>
          It is a long established fact that a reader will be distracted by the readable
        </p>
      </div>
      <div class="car_container">
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/c-1.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Choose Your Car
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/c-2.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Get Your Car
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/c-3.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Contact Your Dealer
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end car section -->

  <!-- about section -->

  <section class="about_section layout_padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 px-0">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/about-img.png') }}" alt="">
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="detail-box">
            <h2>
              About Our Cars
            </h2>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- end about section -->


  <!-- best section -->

  {{-- <section class="best_section">
    <div class="container">
      <div class="book_now">
        <div class="detail-box">
          <h2>
            Our Best Cars
          </h2>
          <p>
            It is a long established fact that a reader will be distracted by the
          </p>
        </div>
        <div class="btn-box">
          <a href="">
            Book Now
          </a>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- end best section -->

  <!-- rent section -->

  <section class="rent_section layout_padding">
    <div class="container">
      <div class="rent_container" style="flex-wrap: wrap">
        @foreach ($produk as $item)
          <div class="box" style="height: auto">
            <div class="img-box">
              <img src="{{ asset('gambar_produk/'.$item->gambar) }}" alt="" width="200px">
            </div>
            <div class="price" >
              <a href="{{ route('home.detail_produk', $item->id) }}">
                Rp. {{ number_format($item->harga, 2) }}
              </a>
               {{-- <h5 style="font-weight: 700">
                
                {{ $item->nama_produk }}
              
              </h5> --}}
            </div>
            {{-- <div class="detail-box" style="align-self: flex-start; text-align: left">
              
             
              <h6>
                Tahun : {{ $item->tahun_produksi }} <br>
                Teknologi : {{ $item->teknologi }} <br> 
                Kapasitas Mesin : {{ $item->kapasitas_mesin }} CC
                
              </h6>
              
            </div> --}}
          </div>
          
            
        @endforeach
        
      </div> 
      <div class="btn-box">
        <a href="{{ route('home.allProduk') }}">
          Lihat lebih banyak
        </a>
      </div>
    </div>
  </section>


  <!-- end rent section -->

  <!-- blog section -->

  {{-- <section class="blog_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Latest Blog
        </h2>
        <p>
          It is a long established fact that a reader will be distracted by the
        </p>
      </div>
    </div>
    <div class="blog_container">
      <div class="layout_padding2-top">
        <div class="carousel-wrap ">
          <div class="owl-carousel">
            <div class="item">
              <div class="box">
                <div class="date-box">
                  <h6>
                    04 Nov 2019
                  </h6>
                </div>
                <div class="img-box">
                  <img src="{{ asset('template_showroom/images/b-1.jpg') }}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Vintage
                  </h5>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable The point of using Lorem </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="date-box">
                  <h6>
                    04 Nov 2019
                  </h6>
                </div>
                <div class="img-box">
                  <img src="{{ asset('template_showroom/images/b-2.jpg') }}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Steering wheels
                  </h5>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable The point of using Lorem </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="date-box">
                  <h6>
                    04 Nov 2019
                  </h6>
                </div>
                <div class="img-box">
                  <img src="{{ asset('template_showroom/images/b-3.jpg') }}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Buick Car
                  </h5>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable The point of using Lorem </p>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="date-box">
                  <h6>
                    04 Nov 2019
                  </h6>
                </div>
                <div class="img-box">
                  <img src="{{ asset('template_showroom/images/b-2.jpg') }}" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    Steering wheels
                  </h5>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable The point of using Lorem </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- end blog section -->

  <!-- us section -->

  {{-- <section class="us_section">
    <div class="container">
      <div class="heading_container">
        <h2>
          Why choose Us
        </h2>
        <p>
          It is a long established fact that a reader will be distracted by the
        </p>
      </div>
    </div>
    <div class="us_container layout_padding2">
      <div class="content_box">
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/u-1.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Low Rent
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/u-2.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Fast Car
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/u-3.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Safe Car
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/u-4.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Quick Support
            </h5>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section> --}}

  <!-- end us section -->

  <!-- client section -->

  {{-- <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          What Is say Customer
        </h2>
        <p>
          It is a long established fact that a reader will be distracted by the
        </p>
      </div>
      <div class="layout_padding2-top">
        <div class="carousel-wrap ">
          <div class="owl-carousel">
            <div class="item">
              <div class="box">
                <div class="detail-box">
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
                  </p>
                </div>
                <div class="client_id">
                  <div class="img-box">
                    <img src="{{ asset('template_showroom/images/client-1.png') }}" alt="" class="img-1">
                    <img src="{{ asset('template_showroom/images/client-1-white.png') }}" alt="" class="img-2">
                  </div>
                  <div class="name">
                    <h6>
                      Established
                    </h6>
                    <p>
                      by the readable
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="detail-box">
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
                  </p>
                </div>
                <div class="client_id">
                  <div class="img-box">
                    <img src="{{ asset('template_showroom/images/client-2.png') }}" alt="" class="img-1">
                    <img src="{{ asset('template_showroom/images/client-2-white.png') }}" alt="" class="img-2">
                  </div>
                  <div class="name">
                    <h6>
                      Blished
                    </h6>
                    <p>
                      by the readable
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="detail-box">
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
                  </p>
                </div>
                <div class="client_id">
                  <div class="img-box">
                    <img src="{{ asset('template_showroom/images/client-1.png') }}" alt="" class="img-1">
                    <img src="{{ asset('template_showroom/images/client-1-white.png') }}" alt="" class="img-2">
                  </div>
                  <div class="name">
                    <h6>
                      Establi
                    </h6>
                    <p>
                      by the readable
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="box">
                <div class="detail-box">
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
                  </p>
                </div>
                <div class="client_id">
                  <div class="img-box">
                    <img src="{{ asset('template_showroom/images/client-1.png') }}" alt="" class="img-1">
                    <img src="{{ asset('template_showroom/images/client-1-white.png') }}" alt="" class="img-2">
                  </div>
                  <div class="name">
                    <h6>
                      Establi
                    </h6>
                    <p>
                      by the readable
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section> --}}

  <!-- end client section -->

  <!-- contact section -->

  {{-- <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Request A call back
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="form_container">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="inputName4" placeholder="Name ">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="inputSubject4" placeholder="Phone">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <input type="email" class="form-control" id="inputEmail4" placeholder="Email id">
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="inputMessage" placeholder="Message">
              </div>
              <div class="d-flex justify-content-center">
                <button type="submit" class="">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="contact_items">

        <a href="">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/location.png') }}" alt="">
          </div>
          <h6>
            Loram Ipusum ari
            lo elisant na
          </h6>
        </a>
        <a href="">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/call.png') }}" alt="">
          </div>
          <h6>
            (+12 1234456789)
          </h6>
        </a>
        <a href="">
          <div class="img-box">
            <img src="{{ asset('template_showroom/images/mail.png') }}" alt="">
          </div>
          <h6>
            demo@gmail.com
          </h6>
        </a>

      </div>
      <div class="social_container">
        <div class="social-box">
          <div>
            <a href="">
              <img src="images/fb.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/twitter.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/linkedin.png" alt="">
            </a>
          </div>
          <div>
            <a href="">
              <img src="images/insta.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <!-- end contact section -->

  <!-- map section -->

  {{-- <section class="map_section">
    <!-- map section -->
    <div class="map_container">
      <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
      </div>
    </div>
    <!-- end map section -->
  </section> --}}


  <!-- end map section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p> 
      Copyright &copy; 2020 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
    </p>
  </footer>
  <!-- footer section -->

  
  @include('landing_page.script')
  <script>
    function tukar(posisi){
      
      let posisiSelect = document.getElementById(`pk${posisi}`);
      switch (posisi) {
        //kriteria
        case 1:
          console.log('get posisi select', posisiSelect);
          if(posisiSelect.name === 'kriteria12'){
            document.getElementById(`k1`).innerHTML = 'Tahun Produksi'
            document.getElementById(`k2`).innerHTML = 'Harga'
            posisiSelect.setAttribute('name', 'kriteria21');
          }else{
            document.getElementById(`k1`).innerHTML = 'Harga'
            document.getElementById(`k2`).innerHTML = 'Tahun Produksi'
            posisiSelect.setAttribute('name', 'kriteria12');
          }
          break;
        case 2:
          console.log('get posisi select', posisiSelect);
          if(posisiSelect.name === 'kriteria13'){
            document.getElementById(`k3`).innerHTML = 'Kapasitas Mesin'
            document.getElementById(`k4`).innerHTML = 'Harga'
            posisiSelect.setAttribute('name', 'kriteria31');
          }else{
            document.getElementById(`k3`).innerHTML = 'Harga'
            document.getElementById(`k4`).innerHTML = 'Kapasitas Mesin'
            posisiSelect.setAttribute('name', 'kriteria13');
          }
          break;
        case 3:
          console.log('get posisi select pk', posisiSelect);
          if(posisiSelect.name === 'kriteria23'){
            document.getElementById(`k5`).innerHTML = 'Tahun Produksi'
            document.getElementById(`k6`).innerHTML = 'Kapasitas Mesin '
            posisiSelect.setAttribute('name', 'kriteria32');
          }else{
            document.getElementById(`k5`).innerHTML = 'Kapasitas Mesin'
            document.getElementById(`k6`).innerHTML = 'Tahun Produksi'
            posisiSelect.setAttribute('name', 'kriteria23');
          }
          break;
        //harga
        case 4:
          console.log('get posisi select', posisiSelect);
          if(posisiSelect.name === 'h12'){
            document.getElementById(`k7`).innerHTML = 'Standart'
            document.getElementById(`k8`).innerHTML = 'Ekonomis '
            posisiSelect.setAttribute('name', 'h21');
          }else{
            document.getElementById(`k7`).innerHTML = 'Ekonomis'
            document.getElementById(`k8`).innerHTML = 'Standart'
            posisiSelect.setAttribute('name', 'h12');
          }
          break;
        case 5:
          console.log('get posisi select', posisiSelect);
          if(posisiSelect.name === 'h13'){
            document.getElementById(`k9`).innerHTML = 'Premium'
            document.getElementById(`k10`).innerHTML = 'Ekonomis'
            posisiSelect.setAttribute('name', 'h31');
          }else{
            document.getElementById(`k9`).innerHTML = 'Ekonomis'
            document.getElementById(`k10`).innerHTML = 'Premium'
            posisiSelect.setAttribute('name', 'h13');
          }
          break;
        case 6:
          console.log('get posisi select', posisiSelect);
          if(posisiSelect.name === 'h23'){
            document.getElementById(`k11`).innerHTML = 'Premium'
            document.getElementById(`k12`).innerHTML = 'Standart'
            posisiSelect.setAttribute('name', 'h32');
          }else{
            document.getElementById(`k11`).innerHTML = 'Standart'
            document.getElementById(`k12`).innerHTML = 'Premium'
            posisiSelect.setAttribute('name', 'h23');
          }
          break;
        // tahun
        case 7:
          if(posisiSelect.name === 't12'){
            document.getElementById(`k13`).innerHTML = 'Menengah'
            document.getElementById(`k14`).innerHTML = 'Terbaru'
            posisiSelect.setAttribute('name', 't21');
          }else{
            document.getElementById(`k13`).innerHTML = 'Terbaru'
            document.getElementById(`k14`).innerHTML = 'Menengah'
            posisiSelect.setAttribute('name', 't12');
          }
          break;
        case 8:
          if(posisiSelect.name === 't13'){
            document.getElementById(`k15`).innerHTML = 'Terlama'
            document.getElementById(`k16`).innerHTML = 'Terbaru'
            posisiSelect.setAttribute('name', 't31');
          }else{
            document.getElementById(`k15`).innerHTML = 'Terbaru'
            document.getElementById(`k16`).innerHTML = 'Terlama'
            posisiSelect.setAttribute('name', 't13');
          }
          break;
        case 9:
          if(posisiSelect.name === 't23'){
            document.getElementById(`k17`).innerHTML = 'Terlama'
            document.getElementById(`k18`).innerHTML = 'Menengah'
            posisiSelect.setAttribute('name', 't32');
          }else{
            document.getElementById(`k17`).innerHTML = 'Menengah'
            document.getElementById(`k18`).innerHTML = 'Terlama'
            posisiSelect.setAttribute('name', 't23');
          }
          break;
        // kapasitas mesin
        case 10:
          if(posisiSelect.name === 'kps12'){
            document.getElementById(`k19`).innerHTML = 'Menengah'
            document.getElementById(`k20`).innerHTML = 'Kecil'
            posisiSelect.setAttribute('name', 'kps21');
          }else{
            document.getElementById(`k19`).innerHTML = 'Kecil'
            document.getElementById(`k20`).innerHTML = 'Menengah'
            posisiSelect.setAttribute('name', 'kps12');
          }
          break;
        case 11:
          if(posisiSelect.name === 'kps13'){
            document.getElementById(`k21`).innerHTML = 'Besar'
            document.getElementById(`k22`).innerHTML = 'Kecil'
            posisiSelect.setAttribute('name', 'kps31');
          }else{
            document.getElementById(`k21`).innerHTML = 'Kecil'
            document.getElementById(`k22`).innerHTML = 'Besar'
            posisiSelect.setAttribute('name', 'kps13');
          }
          break;
        case 12:
          if(posisiSelect.name === 'kps23'){
            document.getElementById(`k23`).innerHTML = 'Besar'
            document.getElementById(`k24`).innerHTML = 'Menengah'
            posisiSelect.setAttribute('name', 'kps32');
          }else{
            document.getElementById(`k23`).innerHTML = 'Menengah'
            document.getElementById(`k24`).innerHTML = 'Besar'
            posisiSelect.setAttribute('name', 'kps23');
          }
          break;
        
      
        default:
          break;
      }
    }


    $(document).ready(function(){
          
      var current_fs, next_fs, previous_fs; //fieldsets
      var opacity;

      $(".next").click(function(){
          
          current_fs = $(this).parent();
          next_fs = $(this).parent().next();
          
          //Add Class Active
          $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
          
          //show the next fieldset
          next_fs.show(); 

          //hide the current fieldset with style
          current_fs.animate({opacity: 0}, {
              step: function(now) {
                  // for making fielset appear animation
                  opacity = 1 - now;

                  current_fs.css({
                      'display': 'none',
                      'position': 'relative'
                  });
                  next_fs.css({'opacity': opacity});
              }, 
              duration: 600
          });
      });

      $(".previous").click(function(){
          
          current_fs = $(this).parent();
          previous_fs = $(this).parent().prev();
          
          //Remove class active
          $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
          
          //show the previous fieldset
          previous_fs.show();

          //hide the current fieldset with style
          current_fs.animate({opacity: 0}, {
              step: function(now) {
                  // for making fielset appear animation
                  opacity = 1 - now;

                  current_fs.css({
                      'display': 'none',
                      'position': 'relative'
                  });
                  previous_fs.css({'opacity': opacity});
              }, 
              duration: 600
          });
      });

      // $('.radio-group .radio').click(function(){
      //     $(this).parent().find('.radio').removeClass('selected');
      //     $(this).addClass('selected');
      // });

      // $(".submit").click(function(){
      //     return false;
      // })
          
      });
  </script>
</body>

</html>