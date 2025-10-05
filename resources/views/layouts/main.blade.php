<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <div id="app">
        {{-- SIDEBAR --}}
        @include('layouts.sidebar')
        <div id="main" class='layout-navbar'>
          {{-- NAVBAR --}}
            @include('layouts.navbar')
            {{-- MAIN CONTENT --}}
            <div id="main-content">

                @yield('content')

                {{-- FOOTER --}}
                @include('layouts.footer')
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset ('template/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> --}}
    <script src="{{ asset ('template/assets/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ asset ('template/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset ('template/assets/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset ('template/assets/vendors/toastify/toastify.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    @stack('script')
   

    <script src="{{ asset ('template/assets/js/main.js') }}"></script>
</body>

</html>