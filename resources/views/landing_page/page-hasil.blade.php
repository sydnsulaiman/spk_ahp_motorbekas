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
  <link rel="stylesheet" type="text/css" href="{{ asset ('template_showroom/css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset ('template_showroom/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset ('template_showroom/css/responsive.css') }}" rel="stylesheet" />
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
    @include('landing_page.header')
    <!-- end header section -->
  </div>

  <!-- car section -->

  <section class="car_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Hasil Pencarian
        </h2>
        <p>
          It is a long established fact that a reader will be distracted by the readable
        </p>
      </div>
      <div class="car_container " style="gap: 10%" >
      {{-- <div class="box" style="display: flex; justify-content: space-between;flex-wrap: wrap; " > --}}
        @forelse ($product as $item)
          <div class="box" style="display:flex;flex-direction:column; width:300px;">
            <div class="img-box">
              <img src="{{ asset('gambar_produk/'.$item->gambar) }}" alt="">
            </div>
            <div class="detail-box" style="text-align: justify">
              <h5>
                Rp. {{ number_format($item->harga, 2) }}
              </h5>
              <div style="display: flex; flex-direction: column; row-gap: 1px">
                <p style="font-size: 16px">
                  {{ $item->nama_produk }}
                  {{-- , Tahun {{ $item->tahun_produksi }}, {{ $item->teknologi }}, {{ $item->kapasitas_mesin }} CC --}}
                </p>
                <p style="font-size: 14px;color:gray">
                  {{ $item->alamat_showroom }}
                </p>

              </div>
              <a href="{{ route('home.detail_produk', $item->id) }}">
                Details
              </a>
            </div>
          </div>
          
        @empty
          
        @endforelse
        {{-- <div class="box" style="display:flex;flex-direction:column; width:300px">
          <div class="img-box">
            <img src="{{asset('template_showroom/images/c-2.png') }}" alt="">
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
        <div class="box" style="display:flex;flex-direction:column; width:300px" >
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
        <div class="box" style="display:flex;flex-direction:column; width:300px">
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
        
        <div class="box" style="display:flex;flex-direction:column; width:300px">
          <div class="img-box">
            <img src="{{asset('template_showroom/images/c-3.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Contact Your Dealer terakhir
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box" style="display:flex;flex-direction:column; width:300px">
          <div class="img-box">
            <img src="{{asset('template_showroom/images/c-3.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Contact Your Dealer terakhir 31 
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box" style="display:flex;flex-direction:column; width:300px">
          <div class="img-box">
            <img src="{{asset('template_showroom/images/c-3.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Contact Your Dealer terakhir 12
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="box" style="display:flex;flex-direction:column; width:300px">
          <div class="img-box">
            <img src="{{asset('template_showroom/images/c-3.png') }}" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Contact Your Dealer terakhir 111
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by the readable content of a page when
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>         --}}
        
      </div>
    </div>
  </section>

  <!-- end car section -->


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

  {{-- <section class="rent_section layout_padding">
    <div class="container">
      <div class="rent_container">
        <div class="box">
          <div class="img-box">
            <img src="images/r-1.png" alt="">
          </div>
          <div class="price">
            <a href="">
              Rent $200
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/r-2.png" alt="">
          </div>
          <div class="price">
            <a href="">
              Rent $200
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/r-3.png" alt="">
          </div>
          <div class="price">
            <a href="">
              Rent $200
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/r-4.png" alt="">
          </div>
          <div class="price">
            <a href="">
              Rent $200
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/r-5.png" alt="">
          </div>
          <div class="price">
            <a href="">
              Rent $200
            </a>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/r-6.png" alt="">
          </div>
          <div class="price">
            <a href="">
              Rent $200
            </a>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          See More
        </a>
      </div>
    </div>
  </section> --}}


  <!-- end rent section -->

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