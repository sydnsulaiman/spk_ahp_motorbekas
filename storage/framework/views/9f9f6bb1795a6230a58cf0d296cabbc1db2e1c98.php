<div class="modal fade text-left" id="warning" tabindex="-1"
    role="dialog" aria-labelledby="myModalLabel110"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title white" id="myModalLabel110">
                    Form Edit Data
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
                  <form id="form-edit-data" data-id="" class=" form-vertical"   enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field("PUT"); ?>
                      <div id="div-edit-error" class="alert alert-danger alert-dismissible show fade" style="display:none">
                        <p id="pesan-edit-error">

                        </p>
                        <button type="button" class="btn-close" onclick="closeEditPesanError()" aria-label="Close"></button>
                      </div>
                      <div class="form-body">
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="nama-kriteria">Nama Kriteria</label>
                                      <input type="text" id="nama-kriteria" class="form-control" name="nama_kriteria" placeholder="Nama Kriteria...">
                                      
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="harga-kriteria">Kode Kriteria</label>
                                      <input type="text" id="kode-kriteria" class="form-control" name="kode_kriteria" placeholder="Kode Kriteria...">
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
          const closeEditPesanError = () => {
            document.getElementById('div-edit-error').style.display = 'none';
            $('#pesan-edit-error').text(``);
          }

      
          $(document).ready(function() {
          // Ensure jQuery is available
          console.log(typeof $); // Should return "function" if jQuery is loaded

          // Select the form using the correct ID
          var form = '#form-edit-data'; // Make sure this matches your form's ID

          console.log('Script is running, ready to submit form.');

          // Bind the submit event to the form
          $(form).on('submit', function(event) {
              event.preventDefault(); // Prevent the default form submission (page refresh)

              console.log('Form submission triggered via AJAX');

              // Get the form action URL and data
              var url = $(this).attr('data-action');
              var id = $(this).attr('data-id');

              console.log('ID TEST', url + id);
              
              var formData = new FormData(this);


              // AJAX request
              $.ajax({
                  url: url+id,
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
                      let item = ['nama_kriteria','kode_kriteria']
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
<?php $__env->stopPush(); ?><?php /**PATH D:\xamp\htdocs\si_ahp_motorbekas\resources\views/kriteria/form-edit.blade.php ENDPATH**/ ?>