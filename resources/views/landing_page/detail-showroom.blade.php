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
    <div class="container" style="height: 40.3vh;">
      <div class="row col-md-12" style="margin-inline: auto;">
        <div class="col-md-4">
          <div class="co">
            <img src="{{asset ('gambar_showroom/'.$showroom->gambar) }}" style="width: 80%"  alt="">
          </div>
        </div>
        <div class="col-md-8 " style="padding-left: 5%">
          <div class="detail-box" style="text-align: justify">
              <h3 >
                {{ $showroom->nama_showroom }}
              </h3>
              <h6>
                Tahun Berdiri : {{ $showroom->tahun_berdiri }} <br>
                No Hp : {{ $showroom->no_hp }} <br> 
                Alamat : {{ $showroom->alamat }}
                
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
            {{ $showroom->nama_showroom }}
          </h2>
          <p>
            semua produk dari showroom {{ $showroom->nama_showroom }}
          </p>
        </div>
        <div class="btn-box">
          <a href="{{ route('home.allProduk', $showroom->id) }}">
            Lihat lebih banyak
          </a>
        </div>
      </div>
    </div>
  </section>

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
        <a href="{{ route('home.allProduk', $showroom->id) }}">
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

  @include('landing_page.script')
</body>

</html>