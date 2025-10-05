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
                  <form id="form-edit-data" data-id="" class=" form-vertical"  data-action="{{ route('showroom.update', Auth::guard('showroom')->user()->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method("PUT")
                      <div id="div-edit-error" class="alert alert-danger alert-dismissible show fade" style="display:none">
                        <p id="pesan-edit-error">

                        </p>
                        <button type="button" class="btn-close" onclick="closeEditPesanError()" aria-label="Close"></button>
                      </div>
                      <div class="form-body">
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="nama_showroom-edit">Nama Showroom</label>
                                      <input type="text" id="nama_showroom-edit" class="form-control" name="nama_showroom" placeholder="Nama Showroom...">
                                      
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="nama_pic-showroom-edit">Nama Pemilik</label>
                                      <input type="text" id="nama_pic-showroom-edit" class="form-control" name="nama_pic" placeholder="Nama Pemilik...">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="email-showroom-edit">Email Pemilik</label>
                                      <input type="email" id="email-showroom-edit" class="form-control" name="email" placeholder="Email Pemilik...">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="password-showroom-edit">Kata Sandi Pemilik</label>
                                      <input type="password" id="password-showroom-edit" class="form-control" autocomplete="new-password" name="password" placeholder="Kata Sandi Pemilik...">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="no_hp-showroom-edit">Nomor HP Pemilik</label>
                                      <input type="number" id="no_hp-showroom-edit" class="form-control" name="no_hp" placeholder="Nomor Handphone Pemilik...">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="tahun_berdiri">Tahun Berdiri</label>
                                      <select class="form-select" id="tahun_berdiri-showroom-edit" name="tahun_berdiri">
                                        <option value="" disabled selected>Pilih Tahun Berdiri</option>
                                        {{ $last= 2000 }}
                                        {{ $now = date('Y') }}

                                        @for ($i = $now; $i >= $last; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                      </select>
                                      {{-- <input type="year" id="tahun-produk" class="form-control" name="tahun_produksi" placeholder="Tahun Produk..."> --}}
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="alamat-showroom-edit">Alamat</label>
                                      <textarea  id="alamat-showroom-edit" class="form-control" name="alamat" placeholder="Alamat Produk..."></textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="gambar-id">Gambar</label>
                                      <input class="form-control" type="file" name="gambar" id="gambar-id">
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
            {{-- <div class="modal-footer"> --}}
                

                {{-- <button type="submit" class="btn btn-success ml-1"

                    data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>

@push('script')
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
              var formData = new FormData(this);
             
              console.log('ID TEST', url + id);

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
                      let item = ['id_showroom','nama_produk','harga','tahun_produksi','teknologi','kapasitas_mesin','gambar']
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
@endpush