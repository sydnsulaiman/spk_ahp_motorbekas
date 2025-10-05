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
                  <form id="form-tambah-data" class=" form-vertical"  data-action="{{ route('produk.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div id="div-error" class="alert alert-danger alert-dismissible show fade" style="display:none">
                        <p id="pesan-error">

                        </p>
                        <button type="button" class="btn-close" onclick="closePesanError()" aria-label="Close"></button>
                      </div>
                      <div class="form-body">
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="nama-produk-vertical">Nama Produk</label>
                                      <input type="text" id="nama-produk-vertical" class="form-control" name="nama_produk" placeholder="Nama Produk...">
                                      
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="harga-produk-vertical">Harga Produk</label>
                                      <input type="number" id="harga-produk-vertical" class="form-control" name="harga" placeholder="Harga Produk...">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="tahun-produk-vertical">Tahun Produk</label>
                                      <select class="form-select" id="basicSelect" name="tahun_produksi">
                                        <option value="" disabled selected>Pilih Tahun Produksi</option>
                                        {{ $last= 2010 }}
                                        {{ $now = date('Y') }}

                                        @for ($i = $now; $i >= $last; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                      </select>
                                      {{-- <input type="year" id="tahun-produk-vertical" class="form-control" name="tahun_produksi" placeholder="Tahun Produk..."> --}}
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="teknologi-produk-vertical">Teknologi Produk</label>
                                      <input type="text" id="teknologi-produk-vertical" class="form-control" name="teknologi" placeholder="Teknologi Produk...">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="harga-produk-vertical">Kapasitas Mesin (cc)</label>
                                      <input type="number" id="harga-produk-vertical" class="form-control" name="kapasitas_mesin" placeholder="Kapasitas Mesin ...">
                                  </div>
                              </div>

                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="email-id-vertical">Gambar</label>
                                      <input class="form-control" type="file" name="gambar" id="formFile">
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