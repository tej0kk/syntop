<!DOCTYPE html>
<html lang="en">
<head>
    {{-- panggil header.blade.php --}}
    @include('template.header')
    <title>@yield('title')</title>
    
</head>
<body>
    <div id="app">
        {{-- panggil sidebar.blade.php --}}
        @include('template.sidebar')
        <div id="main"> 
            {{-- panggil content --}}
            @yield('content')
            {{-- panggil footer.blade.php --}}
            @include('template.footer')
        </div>
    </div>
    <script src="{{asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>