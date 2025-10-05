<header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <a class="navbar-brand" href="/">
        <span>
          SPK MOTOR BEKAS
        </span>
      </a>

      <div class="navbar-collapse" id="">
        <div class="user_option">
          <a href="<?php echo e(route('login.index')); ?>">
            Login
          </a>
        </div>
        <div class="custom_menu-btn">
          <button onclick="openNav()">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>
        </div>
        <div id="myNav" class="overlay">
          <div class="overlay-content">
            <a href="/">Beranda</a>
            <a href="/all_produk">Daftar Motor</a>
            <a href="/all_showroom">Daftar Showroom</a>
            
            
            
            <a href="<?php echo e(route('login.index')); ?>">
              Login
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header><?php /**PATH C:\si_ahp_motorbekas\resources\views/landing_page/header.blade.php ENDPATH**/ ?>