<div class="modal" fade" id="exampleModalCenter-<?php echo e($item->id); ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
        <div class="modal-content">
            
            <div class="modal-body" style="display: flex; justify-content:center">
                <img src="<?php echo e(asset('gambar_produk/'.$item->gambar)); ?>" alt="" style="height: 500px; width: 500px">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                
            </div>
        </div>
    </div>
</div><?php /**PATH C:\si_ahp_motorbekas\resources\views/produk/show-image.blade.php ENDPATH**/ ?>