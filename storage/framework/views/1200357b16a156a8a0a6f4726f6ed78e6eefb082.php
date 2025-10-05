

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Kriteria</h3>
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
                    <?php echo $__env->make('kriteria.form-add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    

                   

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                
                                <th >Nama</th>
                                <th >Kode</th>
                                <th >---</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    
                                    <td><?php echo e($item->nama_kriteria); ?></td>
                                    <td><?php echo e($item->kode_kriteria); ?></td>
                                    <td style="width: 20%">
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
                                </tr>

                                <!--FORM EDIT MODAL -->
                                <?php echo $__env->make('kriteria.form-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
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
                
                // output.src = `<?php echo e(asset('gambar_produk')); ?>/${data.gambar}`

            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\si_ahp_motorbekas\resources\views/kriteria/index.blade.php ENDPATH**/ ?>