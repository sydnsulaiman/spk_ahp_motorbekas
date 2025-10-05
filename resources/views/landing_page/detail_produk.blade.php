<!DOCTYPE html>
<html>
  @include('landing_page.head')

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    @include('landing_page.header')
    <!-- end header section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding2-top layout_padding-bottom ">
    <div class="container" style="height: 71.3vh;">
      <div class="row col-md-12" style="margin-inline: auto;">
        <div class="col-md-4">
          <div class="co">
            <img src="{{asset ('gambar_produk/'.$produk->gambar) }}" style="width: 100%"  alt="">
          </div>
        </div>
        <div class="col-md-8 " style="padding-left: 5%">
          <div class="detail-box" style="text-align: justify">
              <h3 >
                {{ $produk->nama_produk }}
              </h3>
              <h5 style="font-weight: 700">
                Rp. {{ number_format($produk->harga, 2) }}
              </h5>
              <h6>
                Tahun : {{ $produk->tahun_produksi }} <br>
                Teknologi : {{ $produk->teknologi }} <br> 
                Kapasitas Mesin : {{ $produk->kapasitas_mesin }} CC
                
              </h6>
              <div style="display: flex; flex-direction: column; row-gap: 2px">
              </div>
              <div style="margin-top: 3%">
                <h6 style="color:gray;margin:0">Dijual di showroom : 
                  <a href="" style="    display: inline-block;
                    padding: 0;
                    background-color: transparent;
                    color: blue;
                    text-decoration: underline;
                    border-radius: #000000;
                    border: 0px solid #f22324;
                    margin-top: 0px;
                    "> 
                    {{ $produk->nama_showroom }}
                  </a> 
                  </h6>
                <p style="font-size: 14px;color:gray; margin:0">
                  {{ $produk->alamat_showroom }}, No Telp {{ $produk->nohp_showroom }}
                </p>
                <p style="font-size: 14px;color:gray; margin:0">
                  
                </p>
              </div>
              
            </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      Copyright &copy; 2020 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
    </p>
  </footer>
  <!-- footer section -->

  @include('landing_page.script')
</body>

</html>