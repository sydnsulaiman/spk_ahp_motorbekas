@extends('layouts.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Perhitungan</h3>
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
                  

                    <!--FORM TAMBAH MODAL -->
                    {{-- @include('kriteria.form-add') --}}
                    {{-- END FORM TAMBAH MODAL --}}

                   

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                {{-- <th>Showroom</th> --}}
                                <th >No</th>
                                <th >Nama User</th>
                                <th >---</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    {{-- <td>{{ $item->nama_showroom }}</td> --}}
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_user }}</td>
                                    <td style="width: 20%">
                                        <a href="{{ route("perhitungan.detail", $item->id) }}" class="btn btn-primary">
                                            <dt class="the-icon"><i class="fa fa-list-alt"></i></dt>
                                        </a>
                                        {{-- BUTTON DELETE --}}
                                        <a href="#" class="btn btn-danger deleteRecord" data-id={{ $item->id }}>
                                             <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a>
                                    </td>
                                </tr>
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
    


        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            var token =  $("meta[name='csrf-token']").attr("content");
            if (confirm("Apakah anda yakin ingin menghapus data tersebut!!") == true) {
                $.ajax(
                    {
                        url: "kriteria/"+id,
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
        
        });

        function getEditData(id){
            let form = document.getElementById('form-edit-data');
            const url =`/kriteria/${id}/edit`;
            console.log('ID', id);

            $.get(url, function (data) {
                console.log('DATA', data)
                $('#warning').modal('show');
                $('#nama-kriteria').val(data.nama_kriteria);
                $('#kode-kriteria').val(data.kode_kriteria);
                form.setAttribute('data-id', data.id);
                form.setAttribute('data-action', '/kriteria/');
                
                // output.src = `{{ asset('gambar_produk')}}/${data.gambar}`

            })
        }
    </script>
@endpush
