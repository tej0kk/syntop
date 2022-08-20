<!DOCTYPE html>
<html lang="en">
<head>
    {{-- panggil header.blade.php --}}
    @include('template.header')
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

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>