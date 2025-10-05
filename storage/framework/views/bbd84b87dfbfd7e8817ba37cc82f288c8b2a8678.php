

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                
               
            </div>
        </div>
        <section class="section">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Detail Perhitungan</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Matrik Kriteria</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Matriks Sub : Harga</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Matriks Sub : Tahun</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="kps-tab" data-bs-toggle="tab" href="#kps" role="tab" aria-controls="kps" aria-selected="false">Matriks Sub : Kapasitas Mesin</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="produk-tab" data-bs-toggle="tab" href="#produk" role="tab" aria-controls="produk" aria-selected="false">Daftar Produk</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        
                                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Matriks Perbandingan Kriteria</h4>
                                                        </div>
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <!-- Table with outer spacing -->
                                                                <div class="table-responsive">
                                                                    <table class="table table-lg">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>--</th>
                                                                                <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <th><?php echo e($k->nama_kriteria); ?></th>
                                                                                    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $krit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    
                                                                                    <th class="text-bold-500"><?php echo e($krit->nama_kriteria); ?></th>
                                                                                    <?php $__currentLoopData = $bobot_kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if($krit->id === $bk->id_kriteria): ?>
                                                                                            <td><?php echo e($bk->bobot_kriteria); ?></td>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </tr>    
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    <th>Total</th>
                                                                                    <?php $__currentLoopData = $bobot_kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bokri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if($bokri->id_kriteria === $bokri->id_kriteria_tujuan): ?>
                                                                                            <th><?php echo e($bokri->total); ?></th>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </tr>
                                                                            
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Matriks Nilai Kriteria</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- Table with outer spacing -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-lg">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>--</th>
                                                                                    <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <th><?php echo e($k->nama_kriteria); ?></th>
                                                                                        
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <th>Jumlah</th>
                                                                                    <th>Prioritas</th>
                                                                                    <th>Eigen Value</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $krit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        
                                                                                        <th class="text-bold-500"><?php echo e($krit->nama_kriteria); ?></th>
                                                                                        <?php $__currentLoopData = $bobot_kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($krit->id === $bk->id_kriteria): ?>
                                                                                                <td><?php echo e($bk->bobot_kriteria2); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php $__currentLoopData = $kriteria_summaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($krit->id === $ks->id_kriteria): ?>
                                                                                                <td><?php echo e($ks->jumlah); ?></td>
                                                                                                <td><?php echo e($ks->prioritas); ?></td>
                                                                                                <td><?php echo e($ks->eigen_value); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                                    </tr>    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    <th>Total</th>
                                                                                    <th>1</th>
                                                                                    <th>1</th>
                                                                                    <th>1</th>
                                                                                    <th><?php echo e($kriteria->count()); ?></th>
                                                                                    <th>1</th>
                                                                                    <th><?php echo e($perhitungan->total_eigen); ?></th>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-12">
                                                                    <div class="col-12" style="display: flex;">
                                                                        <h5>CI =</h5>
                                                                        <h5 style="margin-left: 3%"><?php echo e(($perhitungan->total_eigen-$kriteria->count())/($kriteria->count()-1)); ?></h5>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <h5>Ratio Index =</h5>
                                                                        <h5 style="margin-left: 5%">0.58</h5>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <h5>Consistency Ratio =</h5>
                                                                        <h5 style="margin-left: 5%"><?php echo e($perhitungan->consistency_ratio); ?></h5>
                                                                        <?php if($perhitungan->consistency_ratio > 0.1): ?>
                                                                            <h5 style="margin-left: 5%">TIDAK KONSISTEN</h5>
                                                                        <?php else: ?>
                                                                            <h5 style="margin-left: 5%">KONSISTEN</h5>
                                                                            
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Matriks Perbandingan Subkriteria : HARGA</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- Table with outer spacing -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-lg">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>--</th>
                                                                                    <?php $__currentLoopData = $subkriteria_harga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <th><?php echo e($k->nama_subkriteria); ?></th>
                                                                                        
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $subkriteria_harga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkritHarga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        
                                                                                        <th class="text-bold-500"><?php echo e($subkritHarga->nama_subkriteria); ?></th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_harga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sbkHarga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritHarga->id === $sbkHarga->id_subkriteria): ?>
                                                                                                <td><?php echo e($sbkHarga->bobot_subkriteria); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </tr>    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        <th>Total</th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_harga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_bokri_harga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($sub_bokri_harga->id_subkriteria === $sub_bokri_harga->id_subkriteria_tujuan): ?>
                                                                                                <th><?php echo e($sub_bokri_harga->total_subkriteria); ?></th>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </tr>
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Matriks Nilai Subkriteria : HARGA</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- Table with outer spacing -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-lg">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>--</th>
                                                                                    <?php $__currentLoopData = $subkriteria_harga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skH): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <th><?php echo e($skH->nama_subkriteria); ?></th>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <th>Jumlah</th>
                                                                                    <th>Prioritas</th>
                                                                                    <th>Eigen Value</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $subkriteria_harga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkritHarga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        
                                                                                        <th class="text-bold-500"><?php echo e($subkritHarga->nama_subkriteria); ?></th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_harga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bskHarga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritHarga->id === $bskHarga->id_subkriteria): ?>
                                                                                                <td><?php echo e($bskHarga->bobot_subkriteria2); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php $__currentLoopData = $subkriteria_summariesH; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sksHarga): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritHarga->id === $sksHarga->id_subkriteria): ?>
                                                                                                <td><?php echo e($sksHarga->jumlah); ?></td>
                                                                                                <td><?php echo e($sksHarga->prioritas); ?></td>
                                                                                                <td><?php echo e($sksHarga->eigen_value); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                                    </tr>    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    <th>Total</th>
                                                                                    <th>1</th>
                                                                                    <th>1</th>
                                                                                    <th>1</th>
                                                                                    <th><?php echo e($subkriteria_harga->count()); ?></th>
                                                                                    <th>1</th>
                                                                                    <th><?php echo e($subkriteria_summariesH[0]->total_eigen); ?></th>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-12">
                                                                    <div class="col-12" style="display: flex;">
                                                                        <h5>CI =</h5>
                                                                        <h5 style="margin-left: 3%"><?php echo e(($subkriteria_summariesH[0]->total_eigen - $subkriteria_harga->count())/($subkriteria_harga->count()-1)); ?></h5>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <h5>Ratio Index =</h5>
                                                                        <h5 style="margin-left: 5%"><?php echo e($subkriteria_summariesH[0]->ratio_index); ?></h5>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <h5>Consistency Ratio =</h5>
                                                                        <h5 style="margin-left: 5%"><?php echo e($subkriteria_summariesH[0]->cr); ?></h5>
                                                                        <?php if($subkriteria_summariesH[0]->cr > 0.1): ?>
                                                                            <h5 style="margin-left: 5%">TIDAK KONSISTEN</h5>
                                                                        <?php else: ?>
                                                                            <h5 style="margin-left: 5%">KONSISTEN</h5>
                                                                            
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                            </div>

                                        </div>
                                        
                                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                            
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Matriks Perbandingan Subkriteria : TAHUN</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- Table with outer spacing -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-lg">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>--</th>
                                                                                    <?php $__currentLoopData = $subkriteria_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <th><?php echo e($t->nama_subkriteria); ?></th>
                                                                                        
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $subkriteria_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkritTahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        
                                                                                        <th class="text-bold-500"><?php echo e($subkritTahun->nama_subkriteria); ?></th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sbkTahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritTahun->id === $sbkTahun->id_subkriteria): ?>
                                                                                                <td><?php echo e($sbkTahun->bobot_subkriteria); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </tr>    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        <th>Total</th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_bokri_tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($sub_bokri_tahun->id_subkriteria === $sub_bokri_tahun->id_subkriteria_tujuan): ?>
                                                                                                <th><?php echo e($sub_bokri_tahun->total_subkriteria); ?></th>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </tr>
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Matriks Nilai Subkriteria : TAHUN</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- Table with outer spacing -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-lg">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>--</th>
                                                                                    <?php $__currentLoopData = $subkriteria_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skT): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <th><?php echo e($skT->nama_subkriteria); ?></th>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <th>Jumlah</th>
                                                                                    <th>Prioritas</th>
                                                                                    <th>Eigen Value</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $subkriteria_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkritTahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        
                                                                                        <th class="text-bold-500"><?php echo e($subkritTahun->nama_subkriteria); ?></th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_tahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bskTahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritTahun->id === $bskTahun->id_subkriteria): ?>
                                                                                                <td><?php echo e($bskTahun->bobot_subkriteria2); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php $__currentLoopData = $subkriteria_summariesT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sksTahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritTahun->id === $sksTahun->id_subkriteria): ?>
                                                                                                <td><?php echo e($sksTahun->jumlah); ?></td>
                                                                                                <td><?php echo e($sksTahun->prioritas); ?></td>
                                                                                                <td><?php echo e($sksTahun->eigen_value); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                                    </tr>    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    <th>Total</th>
                                                                                    <th>1</th>
                                                                                    <th>1</th>
                                                                                    <th>1</th>
                                                                                    <th><?php echo e($subkriteria_tahun->count()); ?></th>
                                                                                    <th>1</th>
                                                                                    <th><?php echo e($subkriteria_summariesT[0]->total_eigen); ?></th>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>      
                                                                
                                                                <div class="col-12">
                                                                    <div class="col-12" style="display: flex;">
                                                                        <h5>CI =</h5>
                                                                        <h5 style="margin-left: 3%"><?php echo e(($subkriteria_summariesT[0]->total_eigen - $subkriteria_tahun->count())/($subkriteria_tahun->count()-1)); ?></h5>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <h5>Ratio Index =</h5>
                                                                        <h5 style="margin-left: 5%"><?php echo e($subkriteria_summariesT[0]->ratio_index); ?></h5>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <h5>Consistency Ratio =</h5>
                                                                        <h5 style="margin-left: 5%"><?php echo e($subkriteria_summariesT[0]->cr); ?></h5>
                                                                        <?php if($subkriteria_summariesT[0]->cr > 0.1): ?>
                                                                            <h5 style="margin-left: 5%">TIDAK KONSISTEN</h5>
                                                                        <?php else: ?>
                                                                            <h5 style="margin-left: 5%">KONSISTEN</h5>
                                                                            
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                            </div>

                                        </div>
                                        
                                        <div class="tab-pane fade" id="kps" role="tabpanel" aria-labelledby="kps-tab">
                                            
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Matriks Perbandingan Subkriteria : KAPASITAS MESIN</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- Table with outer spacing -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-lg">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>--</th>
                                                                                    <?php $__currentLoopData = $subkriteria_kps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <th><?php echo e($t->nama_subkriteria); ?></th>
                                                                                        
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $subkriteria_kps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkritKps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        
                                                                                        <th class="text-bold-500"><?php echo e($subkritKps->nama_subkriteria); ?></th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_kps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sbkKps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritKps->id === $sbkKps->id_subkriteria): ?>
                                                                                                <td><?php echo e($sbkKps->bobot_subkriteria); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </tr>    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        <th>Total</th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_kps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_bokri_kps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($sub_bokri_kps->id_subkriteria === $sub_bokri_kps->id_subkriteria_tujuan): ?>
                                                                                                <th><?php echo e($sub_bokri_kps->total_subkriteria); ?></th>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </tr>
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Matriks Nilai Subkriteria : KAPASITAS MESIN</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <!-- Table with outer spacing -->
                                                                    <div class="table-responsive">
                                                                        <table class="table table-lg">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>--</th>
                                                                                    <?php $__currentLoopData = $subkriteria_kps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skKps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <th><?php echo e($skKps->nama_subkriteria); ?></th>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <th>Jumlah</th>
                                                                                    <th>Prioritas</th>
                                                                                    <th>Eigen Value</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php $__currentLoopData = $subkriteria_kps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subkritKps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <tr>
                                                                                        
                                                                                        <th class="text-bold-500"><?php echo e($subkritKps->nama_subkriteria); ?></th>
                                                                                        <?php $__currentLoopData = $bobot_subkriteria_kps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bskKps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritKps->id === $bskKps->id_subkriteria): ?>
                                                                                                <td><?php echo e($bskKps->bobot_subkriteria2); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php $__currentLoopData = $subkriteria_summariesKps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sksKps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                            <?php if($subkritKps->id === $sksKps->id_subkriteria): ?>
                                                                                                <td><?php echo e($sksKps->jumlah); ?></td>
                                                                                                <td><?php echo e($sksKps->prioritas); ?></td>
                                                                                                <td><?php echo e($sksKps->eigen_value); ?></td>
                                                                                            <?php endif; ?>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                                    </tr>    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    <th>Total</th>
                                                                                    <th>1</th>
                                                                                    <th>1</th>
                                                                                    <th>1</th>
                                                                                    <th><?php echo e($subkriteria_kps->count()); ?></th>
                                                                                    <th>1</th>
                                                                                    <th><?php echo e($subkriteria_summariesKps[0]->total_eigen); ?></th>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>      
                                                                
                                                                <div class="col-12">
                                                                    <div class="col-12" style="display: flex;">
                                                                        <h5>CI =</h5>
                                                                        <h5 style="margin-left: 3%"><?php echo e(($subkriteria_summariesKps[0]->total_eigen - $subkriteria_kps->count())/($subkriteria_kps->count()-1)); ?></h5>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <h5>Ratio Index =</h5>
                                                                        <h5 style="margin-left: 5%"><?php echo e($subkriteria_summariesKps[0]->ratio_index); ?></h5>
                                                                    </div>
                                                                    <div style="display: flex;">
                                                                        <h5>Consistency Ratio =</h5>
                                                                        <h5 style="margin-left: 5%"><?php echo e($subkriteria_summariesKps[0]->cr); ?></h5>
                                                                        <?php if($subkriteria_summariesKps[0]->cr > 0.1): ?>
                                                                            <h5 style="margin-left: 5%">TIDAK KONSISTEN</h5>
                                                                        <?php else: ?>
                                                                            <h5 style="margin-left: 5%">KONSISTEN</h5>
                                                                            
                                                                        <?php endif; ?>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                            </div>

                                        </div>
                                        
                                        <div class="tab-pane fade" id="produk" role="tabpanel" aria-labelledby="produk-tab">
                                            
                                            <div class="card-body">
                                                <div class="col-12 col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Daftar Produk berdasarkan perhitungan ALGORITMA AHP</h4>
                                                        </div>
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <!-- Table with outer spacing -->
                                                                <div class="table-responsive">
                                                                    <table class="table table-lg">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>--</th>
                                                                                <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <th><?php echo e($k->nama_kriteria); ?></th>
                                                                                    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <th>TOTAL</th>
                                                                                <th>Ranking</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $krit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <tr>
                                                                                    
                                                                                    <th class="text-bold-500"><?php echo e($krit->nama_produk); ?></th>
                                                                                    <td>Rp.<?php echo e(number_format($krit->harga, 2)); ?> <br/>
                                                                                        <?php echo e($krit->sub_harga); ?>  (<?php echo e($krit->total_prioritas_harga); ?>)</td>
                                                                                    <td><?php echo e($krit->tahun_produksi); ?> <br/>
                                                                                        <?php echo e($krit->sub_tahun); ?>  (<?php echo e($krit->total_prioritas_tahun_produksi); ?>)</td>
                                                                                    <td><?php echo e($krit->kapasitas_mesin); ?> <br/>
                                                                                        <?php echo e($krit->sub_kps); ?> (<?php echo e($krit->total_prioritas_kapasitas_mesin); ?>)</td>
                                                                                    <td><?php echo e($krit->total_fix); ?></td>
                                                                                    <td><?php echo e($loop->iteration); ?></td>
                                                                                </tr>    
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/perhitungan/detail_perhitungan.blade.php ENDPATH**/ ?>