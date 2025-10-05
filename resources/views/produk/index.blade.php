@extends('layouts.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Produk</h3>
                </div>
                {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div> --}}
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#success" class="btn btn-success rounded-pill" style="display: flex;align-content: center;width:auto"> 
                        <dt class="the-icon"><span class="fa-fw select-all fas" style="margin-right:10px"></span></dt>
                        Data
                    </button>

                    <!--FORM TAMBAH MODAL -->
                    @include('produk.form-add')
                    {{-- END FORM TAMBAH MODAL --}}

                   

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                {{-- <th>Showroom</th> --}}
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Tahun Produksi</th>
                                <th>Teknologi</th>
                                <th>Kapasitas Mesin</th>
                                <th>---</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    {{-- <td>{{ $item->nama_showroom }}</td> --}}
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->tahun_produksi }}</td>
                                    <td>{{ $item->teknologi }}</td>
                                    <td>{{ $item->kapasitas_mesin }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter-{{ $item->id }}">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a>
                                        {{-- BUTTON EDIT --}}
                                        <button onclick="getEditData({{ $item->id }})" class="btn btn-warning" >
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </button>
                                        {{-- BUTTON DELETE --}}
                                        <a href="#" class="btn btn-danger deleteRecord"  onclick="deleteData({{ $item->id }})">
                                             <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a>
                                    </td>
                                    @include('produk.show-image')
                                </tr>

                                <!--FORM EDIT MODAL -->
                                @include('produk.form-edit')
                                {{-- END FORM EDIT MODAL --}}
                            @empty
                                
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection

@push('script')
    <script>
    


        function deleteData(id){
                // var id = $(this).data("id");
                var token =  $("meta[name='csrf-token']").attr("content");
                console.log('ID DELETE', id);

                if (confirm("Apakah anda yakin ingin menghapus data tersebut!!") == true) {
                    $.ajax(
                        {
                            url: "produk/"+id,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function (response){
                                console.log("it Works");
                                
                                    Toastify({
                                        text: "Data telah diperbaharui",
                                        duration: 3000,
                                        close:true,
                                        gravity:"top",
                                        position: "right",
                                        backgroundColor: "#4fbe87",
                                    }).showToast();
                                setTimeout(() => {
                                    location.reload()
                                }, 3000);
                                
                            }
                        });
                }
        }

        function getEditData(id){
            let form = document.getElementById('form-edit-data');
            const url =`/produk/${id}/edit`;
            console.log('ID', id);
            
            $.get(url, function (data) {
                console.log('DATA', data)
                $('#warning').modal('show');
                $('#nama-produk').val(data.nama_produk);
                $('#harga-produk').val(data.harga);
                $('#tahun-produksi').val(data.tahun_produksi);
                $('#teknologi-produk').val(data.teknologi);
                $('#kapasitas-mesin').val(data.kapasitas_mesin);
                form.setAttribute('data-id', id);
                form.setAttribute('data-action', `/produk/`);
                // $('#form-edit-data').data( { "my-name": "aValue" } ).data();
                // output.src = `{{ asset('gambar_produk')}}/${data.gambar}`

            })
        }
    </script>
@endpush
