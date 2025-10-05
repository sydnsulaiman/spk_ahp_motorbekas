

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('showroom.form-edit-profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                                    <img src="<?php echo e(asset ('gambar_showroom/'.$profile->gambar)); ?>" alt="Face 1">
                                                </div>
                                                <div class="ms-3 name">
                                                    <h5 class="font-bold"><?php echo e($profile->nama_showroom); ?></h5>
                                                    <h6 class="text-muted mb-0"><?php echo e($profile->email); ?></h6>
                                                    <h6 class="text-muted mb-0"><?php echo e($profile->nama_pic); ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" py-4 px-5 ">
                                            <div class="d-flex align-items-center">
                                                <button onclick="getEditData(<?php echo e(Auth::guard('showroom')->user()->id); ?>)" class="d-flex align-items-center btn btn-warning" >
                                                    <dt class="the-icon"><span class="fa-fw select-all fas"></span>
                                                    </dt>
                                                    Edit Profile
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                            
                        </div>


                        <div class="row">
                            
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
                                                        
                                                        <th>Nama</th>
                                                        <th>Harga</th>
                                                        <th>Tahun Produksi</th>
                                                        <th>Teknologi</th>
                                                        <th>Kapasitas Mesin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            
                                                            <td><?php echo e($item->nama_produk); ?></td>
                                                            <td><?php echo e($item->harga); ?></td>
                                                            <td><?php echo e($item->tahun_produksi); ?></td>
                                                            <td><?php echo e($item->teknologi); ?></td>
                                                            <td><?php echo e($item->kapasitas_mesin); ?></td>
                                                            
                                                        </tr>

                                                        <!--FORM EDIT MODAL -->
                                                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        
                                                    <?php endif; ?>
                                                    
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
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
                // output.src = `<?php echo e(asset('gambar_produk')); ?>/${data.gambar}`

            })
        }
    </script>



    <script src="<?php echo e(asset('template/assets/vendors/apexcharts/apexcharts.js')); ?>"></script>
    <script src="<?php echo e(asset('template/assets/js/pages/dashboard.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\si_ahp_motorbekas\resources\views/showroom/index-profile.blade.php ENDPATH**/ ?>