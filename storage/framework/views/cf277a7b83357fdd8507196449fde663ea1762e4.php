<!DOCTYPE html>
<html>

<?php echo $__env->make('landing_page.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <?php echo $__env->make('landing_page.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="slider_container">
        <div class="img-box">
          <img src="<?php echo e(asset('template_showroom/images/hero-img.jpg')); ?>" alt="">
        </div>
        <div class="detail_container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="detail-box">
                  <h1>
                    Rent Car <br>
                    Experts <br>
                    Service
                  </h1>
                  <a href="">
                    Contact Us
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                  <h1>
                    Rent Car <br>
                    Experts <br>
                    Service
                  </h1>
                  <a href="">
                    Contact Us
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                  <h1>
                    Rent Car <br>
                    Experts <br>
                    Service
                  </h1>
                  <a href="">
                    Contact Us
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
  

  <section>
    <div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-md-8">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Form Pencarian Motor Bekas</strong></h2>
                <p>Mencari produk berdasarkan prioritas kategori yang anda pilih.</p>
                <div class="row">
                    <div class="col-md-12">
                        <form id="msform" action="<?php echo e(route('home.post.bobot')); ?>" method="POST" >
                            <?php echo csrf_field(); ?>
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
                                      
                                      
                                      <h3 id="k1">Harga</h3>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      <select name="kriteria12" id="pk1" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
                                      </select>
                                      

                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k2"> Tahun Produksi</h3>

                                      <button onclick="tukar(1)" type="button" class="btn btn-success rounded-pill" style="width: 25%; margin-left:5%" ><i class="fa fa-refresh"></i></button>
                                    </div>
                                  </div>

                                  <div class="form-row mt-4" style="justify-content: center;align-items: center">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k3">Harga</h3>
                                    </div>
                                    <div class="col-md-4">
                                      
                                      <select name="kriteria13" id="pk2" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k4">Kapasitas Mesin</h3>

                                      <button onclick="tukar(2)" type="button" class="btn btn-success rounded-pill" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    </div>
                                  </div>
                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k5">Kapasitas Mesin</h3>
                                    </div>
                                    <div class="col-md-4">
                                      
                                      <select name="kriteria23" id="pk3" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
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

                            
                            <fieldset>
                                <div class="col-lg-12 form-card">
                                  <div class="form-row" >
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center" >
                                      
                                      <h3 id="k7">Ekonomis</h3>
                                    </div>
                                    <div class="col-md-4" >
                                      <select name="h12" id="pk4" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
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
                                      
                                      <select name="h13" id="pk5" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k10">Premium</h3>
                                      <button onclick="tukar(5)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k11">Standart</h3>
                                    </div>
                                    <div class="col-md-4">
                                      
                                      <select name="h23" id="pk6" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k12">Premium</h3>
                                      <button onclick="tukar(6)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            
                            
                            <fieldset>
                                <div class="col-lg-12 form-card">
                                  <div class="form-row" >
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center" >
                                      
                                      <h3 id="k13">Terbaru</h3>
                                    </div>
                                    <div class="col-md-4" >
                                      <select name="t12" id="pk7" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
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
                                      
                                      <select name="t13" id="pk8" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k16">Terlama</h3>
                                      <button onclick="tukar(8)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k17">Menengah</h3>
                                    </div>
                                    <div class="col-md-4">
                                      
                                      <select name="t23" id="pk9" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k18">Terlama</h3>
                                      <button onclick="tukar(9)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>

                            
                            <fieldset>
                                <div class="col-lg-12 form-card">
                                  <div class="form-row" >
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center" >
                                      
                                      <h3 id="k19">Kecil</h3>
                                    </div>
                                    <div class="col-md-4" >
                                      <select name="kps12" id="pk10" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
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
                                      
                                      <select name="kps13" id="pk11" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k22">Besar</h3>
                                      <button onclick="tukar(11)" type="button" class="btn btn-success rounded-pill" type="button" style="width: 25%; margin-left:5%"><i class="fa fa-refresh"></i></button>
                                    
                                    </div>
                                  </div>
                                  <div class="form-row mt-4">
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
                                      <h3 id="k23">Menengah</h3>
                                    </div>
                                    <div class="col-md-4">
                                      
                                      <select name="kps23" id="pk12" class="form-control">
                                        <option selected disabled value="">Pilih nilai perbandingan </option>
                                        <option value="1">Sama penting dengan</option>
                                        <option value="2">Mendekati sedikit lebih penting dari</option>
                                        <option value="3">Sedikit lebih penting dari</option>
                                        <option value="4">Mendekati lebih penting dari</option>
                                        <option value="5">Lebih penting dari</option>
                                        <option value="6">Mendekat sangat penting dari</option>
                                        <option value="7">Sangat Penting dari</option>
                                        <option value="8">Mendekati mutlak dari</option>
                                        <option value="9">Mutlak sangat penting dari</option>
                                      </select>
                                    </div>
                                    <div class="col-md-4" style="display: flex;align-items: center;justify-content: center">
                                      
                                      
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

  

  <!-- end about section -->


  <!-- best section -->

  

  <!-- end best section -->

  <!-- rent section -->

  <section class="rent_section layout_padding">
    <div class="container">
      <div class="rent_container" style="flex-wrap: wrap">
        <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="box" style="height: auto">
            <div class="img-box">
              <img src="<?php echo e(asset('gambar_produk/'.$item->gambar)); ?>" alt="" width="200px">
            </div>
            <div class="price" >
              <a href="<?php echo e(route('home.detail_produk', $item->id)); ?>">
                Rp. <?php echo e(number_format($item->harga, 2)); ?>

              </a>
               
            </div>
            
          </div>
          
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div> 
      <div class="btn-box">
        <a href="<?php echo e(route('home.allProduk')); ?>">
          Lihat lebih banyak
        </a>
      </div>
    </div>
  </section>


  <!-- end rent section -->

  <!-- blog section -->

  

  <!-- end blog section -->

  <!-- us section -->

  

  <!-- end us section -->

  <!-- client section -->

  

  <!-- end client section -->

  <!-- contact section -->

  

  <!-- end contact section -->

  <!-- map section -->

  


  <!-- end map section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p> 
      Copyright &copy; 2020 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
    </p>
  </footer>
  <!-- footer section -->

  
  <?php echo $__env->make('landing_page.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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

</html><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/landing_page/main.blade.php ENDPATH**/ ?>