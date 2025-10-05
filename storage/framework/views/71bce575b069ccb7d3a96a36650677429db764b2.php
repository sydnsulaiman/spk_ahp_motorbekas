

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Showroom</h3>
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
                    <?php echo $__env->make('showroom.form-add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    

                   

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Showroom</th>
                                <th>Nama PIC</th>
                                <th>Email</th>
                                <th>Tahun Berdiri</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>---</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->nama_showroom); ?></td>
                                    <td><?php echo e($item->nama_pic); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->tahun_berdiri); ?></td>
                                    <td><?php echo e($item->alamat); ?></td>
                                    <td><?php echo e($item->no_hp); ?></td>
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
                                </tr>
                                <?php echo $__env->make('showroom.show-image', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <!--FORM EDIT MODAL -->
                                <?php echo $__env->make('showroom.form-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                
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
                        url: "showroom/"+id,
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
                // output.src = `<?php echo e(asset('gambar_produk')); ?>/${data.gambar}`

            })
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/showroom/index.blade.php ENDPATH**/ ?>