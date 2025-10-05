

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
                            <div class="col-6  col-md-6">
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
                            </div>
                            
                        </div>
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
                        </div>
                        <div class="row">
                            
                            <div class="col-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Produk Terakhir</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Comment</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="assets/images/faces/5.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Congratulations on your graduation!</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="assets/images/faces/2.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Wow amazing design! Can you make another
                                                                tutorial for
                                                                this design?</p>
                                                        </td>
                                                    </tr>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/showroom/index-profile.blade.php ENDPATH**/ ?>