<!DOCTYPE html>
<html>
  <?php echo $__env->make('landing_page.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <?php echo $__env->make('landing_page.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end header section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding2-top layout_padding-bottom ">
    <div class="container" style="height: 40.3vh;">
      <div class="row col-md-12" style="margin-inline: auto;">
        <div class="col-md-4">
          <div class="co">
            <img src="<?php echo e(asset ('gambar_showroom/'.$showroom->gambar)); ?>" style="width: 80%"  alt="">
          </div>
        </div>
        <div class="col-md-8 " style="padding-left: 5%">
          <div class="detail-box" style="text-align: justify">
              <h3 >
                <?php echo e($showroom->nama_showroom); ?>

              </h3>
              <h6>
                Tahun Berdiri : <?php echo e($showroom->tahun_berdiri); ?> <br>
                No Hp : <?php echo e($showroom->no_hp); ?> <br> 
                Alamat : <?php echo e($showroom->alamat); ?>

                
              </h6>
              
              </div>
              
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
  <section class="best_section">
    <div class="container">
      <div class="book_now">
        <div class="detail-box">
          <h2>
            <?php echo e($showroom->nama_showroom); ?>

          </h2>
          <p>
            semua produk dari showroom <?php echo e($showroom->nama_showroom); ?>

          </p>
        </div>
        <div class="btn-box">
          <a href="<?php echo e(route('home.allProduk', $showroom->id)); ?>">
            Lihat lebih banyak
          </a>
        </div>
      </div>
    </div>
  </section>

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
        <a href="<?php echo e(route('home.allProduk', $showroom->id)); ?>">
          Lihat lebih banyak
        </a>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      Copyright &copy; 2020 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
    </p>
  </footer>
  <!-- footer section -->

  <?php echo $__env->make('landing_page.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html><?php /**PATH C:\si_ahp_motorbekas\resources\views/landing_page/detail-showroom.blade.php ENDPATH**/ ?>