

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Produk</h3>
                </div>
                
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
                    <?php echo $__env->make('produk.form-add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    

                   

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Tahun Produksi</th>
                                <th>Teknologi</th>
                                <th>Kapasitas Mesin</th>
                                <th>---</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    
                                    <td><?php echo e($item->nama_produk); ?></td>
                                    <td><?php echo e($item->harga); ?></td>
                                    <td><?php echo e($item->tahun_produksi); ?></td>
                                    <td><?php echo e($item->teknologi); ?></td>
                                    <td><?php echo e($item->kapasitas_mesin); ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter-<?php echo e($item->id); ?>">
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a>
                                        
                                        <button onclick="getEditData(<?php echo e($item->id); ?>)" class="btn btn-warning" >
                                            <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </button>
                                        
                                        <a href="#" class="btn btn-danger deleteRecord" data-id=<?php echo e($item->id); ?>>
                                             <dt class="the-icon"><span class="fa-fw select-all fas"></span></dt>
                                        </a>
                                    </td>
                                    <?php echo $__env->make('produk.show-image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </tr>

                                <!--FORM EDIT MODAL -->
                                <?php echo $__env->make('produk.form-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
    


        $(".deleteRecord").click(function(){
            var id = $(this).data("id");
            var token =  $("meta[name='csrf-token']").attr("content");
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
        
        });

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
                // output.src = `<?php echo e(asset('gambar_produk')); ?>/${data.gambar}`

            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/produk/index.blade.php ENDPATH**/ ?>