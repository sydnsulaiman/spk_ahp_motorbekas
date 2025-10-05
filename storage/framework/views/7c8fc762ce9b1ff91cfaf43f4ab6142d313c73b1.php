<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SI AHP Motor Bekas</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('template_showroom/css/bootstrap.css')); ?>" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo e(asset ('template_showroom/css/style.css')); ?>" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo e(asset ('template_showroom/css/responsive.css')); ?>" rel="stylesheet" />
</head>

<style>
  /* div {
    box-sizing: content-box;
  } */
  p{
    margin-bottom: 0;
  }
</style>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <?php echo $__env->make('landing_page.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- end header section -->
  </div>

  <!-- car section -->

  <section class="car_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Daftar Semua Produk
        </h2>
        <p>
          It is a long established fact that a reader will be distracted by the readable
        </p>
      </div>
      <div class="car_container " style="gap: 10%" >
      
        <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="box" style="display:flex;flex-direction:column; width:300px;">
            <div class="img-box">
              <img src="<?php echo e(asset('gambar_produk/'.$item->gambar)); ?>" alt="">
            </div>
            <div class="detail-box" style="text-align: justify">
              <h5>
                Rp. <?php echo e(number_format($item->harga, 2)); ?>

              </h5>
              <div style="display: flex; flex-direction: column; row-gap: 1px">
                <p style="font-size: 16px">
                  <?php echo e($item->nama_produk); ?>, Tahun <?php echo e($item->tahun_produksi); ?>, <?php echo e($item->teknologi); ?>, <?php echo e($item->kapasitas_mesin); ?> CC
                </p>
                <p style="font-size: 14px;color:gray">
                  <?php echo e($item->alamat_showroom); ?>

                </p>

              </div>
              <a href="<?php echo e(route('home.detail_produk', $item->id)); ?>">
                Details
              </a>
            </div>
          </div>
          
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          
        <?php endif; ?>
        
        
      </div>
    </div>
  </section>

  <!-- end car section -->


  <!-- best section -->

  

  <!-- end best section -->

  <!-- rent section -->

  


  <!-- end rent section -->

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

</html><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/landing_page/all-produk.blade.php ENDPATH**/ ?>