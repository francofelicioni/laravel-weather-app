<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('meta-title')</title>
    <meta name="description" content="@yield('meta-description')">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('images/icons/favicon.ico')}}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app" class="grid grid-rows-[auto_1fr_auto] min-h-screen">
        @include('layout.header')
        <main>
            @yield('content')
        </main>
        @include('layout.footer')
    </div>
    @yield('scripts')
</body>


</html>