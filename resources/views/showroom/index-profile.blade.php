@extends('layouts.main')

@section('content')
    @include('showroom.form-edit-profile')
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="card" style="display: flex;align-items: center;flex-direction: row;justify-content: space-between;">
                                        <div class=" py-4 px-5 ">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-xl">
                                                    <img src="{{ asset ('gambar_showroom/'.$profile->gambar) }}" alt="Face 1">
                                                </div>
                                                <div class="ms-3 name">
                                                    <h5 class="font-bold">{{ $profile->nama_showroom }}</h5>
                                                    <h6 class="text-muted mb-0">{{ $profile->email }}</h6>
                                                    <h6 class="text-muted mb-0">{{ $profile->nama_pic }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" py-4 px-5 ">
                                            <div class="d-flex align-items-center">
                                                <button onclick="getEditData({{ Auth::guard('showroom')->user()->id }})" class="d-flex align-items-center btn btn-warning" >
                                                    <dt class="the-icon"><span class="fa-fw select-all fas"></span>
                                                    </dt>
                                                    Edit Profile
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            {{-- <div class="col-6  col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6  col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Followers</h6>
                                                <h6 class="font-extrabold mb-0">183.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6  col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Following</h6>
                                                <h6 class="font-extrabold mb-0">80.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6  col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            
                        </div>

{{--                         
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            {{-- <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                        style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Europe</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">862</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-europe"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-success" width="32" height="32" fill="blue"
                                                        style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">America</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">375</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-america"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                        style="width:10px">
                                                        <use
                                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                    </svg>
                                                    <h5 class="mb-0 ms-3">Indonesia</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <h5 class="mb-0">1025</h5>
                                            </div>
                                            <div class="col-12">
                                                <div id="chart-indonesia"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Produk Terakhir</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table " id="table1">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>Showroom</th> --}}
                                                        <th>Nama</th>
                                                        <th>Harga</th>
                                                        <th>Tahun Produksi</th>
                                                        <th>Teknologi</th>
                                                        <th>Kapasitas Mesin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($produk as $item)
                                                        <tr>
                                                            {{-- <td>{{ $item->nama_showroom }}</td> --}}
                                                            <td>{{ $item->nama_produk }}</td>
                                                            <td>{{ $item->harga }}</td>
                                                            <td>{{ $item->tahun_produksi }}</td>
                                                            <td>{{ $item->teknologi }}</td>
                                                            <td>{{ $item->kapasitas_mesin }}</td>
                                                            
                                                        </tr>

                                                        <!--FORM EDIT MODAL -->
                                                        {{-- END FORM EDIT MODAL --}}
                                                    @empty
                                                        
                                                    @endforelse
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>

@endsection

@push('script')
    <script>
        function getEditData(id){
            let form = document.getElementById('form-edit-data');
            const url =`/showroom/${id}/edit`;
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#warning').modal('show');
                form.setAttribute('data-id', data.id);
                $('#nama_showroom-edit').val(data.nama_showroom);
                $('#nama_pic-showroom-edit').val(data.nama_pic);
                $('#tahun_berdiri-showroom-edit').val(data.tahun_berdiri);
                $('#email-showroom-edit').val(data.email);
                // $('#password-showroom-edit').val(data.password);
                $('#tahun_berdiri-showroom-edit').val(data.tahun_berdiri);
                $('#alamat-showroom-edit').val(data.alamat);
                $('#no_hp-showroom-edit').val(data.no_hp);
                // output.src = `{{ asset('gambar_produk')}}/${data.gambar}`

            })
        }
    </script>



    <script src="{{ asset('template/assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('template/assets/js/pages/dashboard.js') }}"></script>
@endpush
