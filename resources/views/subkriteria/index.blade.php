@extends('layouts.main')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Subkriteria</h3>
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
                    @include('subkriteria.form-add')
                    {{-- END FORM TAMBAH MODAL --}}

                   

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                {{-- <th>Showroom</th> --}}
                                <th >Nama Subkriteria</th>
                                <th >Kode Subkriteria</th>
                                <th >Operator</th>
                                <th >Nilai Pembanding</th>
                                <th >Satuan</th>
                                <th >---</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    {{-- <td>{{ $item->nama_showroom }}</td> --}}
                                    <td>{{ $item->nama_subkriteria }}</td>
                                    <td>{{ $item->kode_subkriteria }}</td>
                                    <td>{{ $item->operator }}</td>
                                    <td>{{ $item->nilai_pembanding }}</td>
                                    <td>{{ $item->satuan }}</td>
                                    <td style="width: 20%">
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter-{{ $item->id }}">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a>
                                        {{-- BUTTON EDIT --}}
                                        <button onclick="getEditData({{ $item->id }})" class="btn btn-warning" >
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </button>
                                        {{-- BUTTON DELETE --}}
                                        <a href="#" class="btn btn-danger deleteRecord" data-id={{ $item->id }}>
                                             <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a>
                                    </td>
                                </tr>

                                <!--FORM EDIT MODAL -->
                                @include('subkriteria.form-edit')
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
    


        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            var token =  $("meta[name='csrf-token']").attr("content");
            if (confirm("Apakah anda yakin ingin menghapus data tersebut!!") == true) {
                $.ajax(
                    {
                        url: "subkriteria/"+id,
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
            const url =`/subkriteria/${id}/edit`;
            console.log('ID', id);
            

            $.get(url, function (data) {
                console.log('DATA', data)
                
                $('#warning').modal('show');
                $('#nama-subkriteria').val(data.nama_subkriteria);
                $('#id_kriteria-subkriteria').val(data.id_kriteria);
                $('#kode-subkriteria').val(data.kode_subkriteria);
                $('#operator-subkriteria').val(data.operator);
                $('#nilai_pembanding-subkriteria').val(data.nilai_pembanding);
                $('#satuan-subkriteria').val(data.satuan);
                form.setAttribute('data-id', data.id);
                form.setAttribute('data-action', '/subkriteria/');
                // output.src = `{{ asset('gambar_produk')}}/${data.gambar}`

            })
        }
    </script>
@endpush
