<div class="modal fade text-left" id="success" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel110"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title white" id="myModalLabel110">
                    Form Tambah Data
                </h5>
                <button type="button" class=""
                    data-bs-dismiss="modal" aria-label="Close" 
                    style="
                    border: transparent;
                    background: transparent;
                    color: white;
                ">
                    x
                </button> 
            </div>
            <div class="modal-body">
               <div class="card-body">
                  <form id="form-tambah-data" class=" form-vertical"  data-action="<?php echo e(route('subkriteria.store')); ?>" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <div id="div-error" class="alert alert-danger alert-dismissible show fade" style="display:none">
                        <p id="pesan-error">

                        </p>
                        <button type="button" class="btn-close" onclick="closePesanError()" aria-label="Close"></button>
                      </div>
                      <div class="form-body">
                          <div class="row">
                            <div class="col-12">
                                  <div class="form-group">
                                        <label for="harga-kriteria-vertical">Kriteria </label>
                                        <select name="id_kriteria" class="form-select" id="basicSelect">
                                            <option selected disabled> Pilih Kriteria </option>
                                            <?php $__currentLoopData = $kriteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"> <?php echo e($item->nama_kriteria); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="nama-kriteria-vertical">Nama Subkriteria</label>
                                      <input type="text" id="nama-kriteria-vertical" class="form-control" name="nama_subkriteria" placeholder="Nama Kriteria...">
                                      
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="harga-kriteria-vertical">Kode Subkriteria</label>
                                      <input type="text" id="harga-kriteria-vertical" class="form-control" name="kode_subkriteria" placeholder="Kode Kriteria...">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                        <label for="harga-kriteria-vertical">Operator </label>
                                        <select name="operator" class="form-select" id="basicSelect">
                                            <option selected disabled> Pilih Operator Pembanding </option>
                                            <option value="<"> < </option>
                                            <option value=">"> > </option>
                                            <option value="<="> <= </option>
                                            <option value=">="> >= </option>
                                        </select>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="operator-kriteria-vertical">Nilai Pembanding</label>
                                      <input type="number" id="nilai_pembanding-kriteria-vertical" class="form-control" name="nilai_pembanding" placeholder="...">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="satuan-kriteria-vertical">Satuan</label>
                                      <input type="text" id="satuan-kriteria-vertical" class="form-control" name="satuan" placeholder="KG, Tahun, CC...">
                                  </div>
                              </div>
                              

                              
                              <div class="col-12 d-flex justify-content-end">
                                  <button type="reset"  class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                  <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                              </div>
                          </div>
                      </div>
                  </form>
                  
              </div>
            </div>
            
                

                
            
        </div>
    </div>
</div>

<?php $__env->startPush('script'); ?>
    <script>
          const closePesanError = () => {
            document.getElementById('div-error').style.display = 'none';
            $('#pesan-error').text(``);
          }

      
          $(document).ready(function() {
          // Ensure jQuery is available
          console.log(typeof $); // Should return "function" if jQuery is loaded

          // Select the form using the correct ID
          var form = '#form-tambah-data'; // Make sure this matches your form's ID

          console.log('Script is running, ready to submit form.');

          // Bind the submit event to the form
          $(form).on('submit', function(event) {
              event.preventDefault(); // Prevent the default form submission (page refresh)

              console.log('Form submission triggered via AJAX');

              // Get the form action URL and data
              var url = $(this).attr('data-action');
              var formData = new FormData(this);


              // AJAX request
              $.ajax({
                  url: url,
                  method: 'POST',
                  data: formData,
                  dataType: 'JSON',
                  contentType: false,
                  cache: false,
                  processData: false,
                  success: function(response) {
                      console.log('AJAX request was successful', response);
                      $(form).trigger("reset"); // Reset the form after success
                      $('#success').modal('hide'); // Hide the modal
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
                      }, 3000); // Alert the user on success
                  },
                  error: function(response) {
                      $('.alert').css('display','block')
                      $('.alert').fadeOut(10000)
                      let item = ['nama_subkriteria','kode_subkriteria','operator','nilai_pembanding','satuan']
                      item.map((v) => {
                        if(response?.responseJSON?.message?.[v]){   
                          const p = response?.responseJSON?.message?.[v][0];
                               
                          $('#pesan-error').append(`${p} <br/>`);
                        }
                        
                      })

                      setTimeout(() => {
                        $('#pesan-error').text(``);
                      }, 15000);
                      // alert('Something went wrong. Please try again.');
                  }
              });
          });
      });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/subkriteria/form-add.blade.php ENDPATH**/ ?>