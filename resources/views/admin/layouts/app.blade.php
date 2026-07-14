<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Dashboard')</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-light">

<div class="d-flex">

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    {{-- Main Content --}}
    <div class="flex-grow-1">

        {{-- Navbar --}}
        @include('admin.layouts.navbar')

        <div class="container-fluid py-4">

            @yield('content')

        </div>

        {{-- Footer --}}
        @include('admin.layouts.footer')

    </div>

</div>

</body>
</html>