<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <div id="app">
        
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="main" class='layout-navbar'>
          
            <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <div id="main-content">

                <?php echo $__env->yieldContent('content'); ?>

                
                <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

    
    <script src="<?php echo e(asset ('template/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset ('template/assets/vendors/simple-datatables/simple-datatables.js')); ?>"></script>
    <script src="<?php echo e(asset ('template/assets/vendors/fontawesome/all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('template/assets/vendors/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('template/assets/vendors/toastify/toastify.js')); ?>"></script>
    
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <?php echo $__env->yieldPushContent('script'); ?>
   

    <script src="<?php echo e(asset ('template/assets/js/main.js')); ?>"></script>
</body>

</html><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/layouts/main.blade.php ENDPATH**/ ?>