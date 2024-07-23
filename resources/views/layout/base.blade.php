<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@yield('meta-title')">
    <meta name="description" content="@yield('meta-description')">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('images/icons/favicon.ico')}}">
</head>

<body class="min-h-screen flex flex-col">
    <div id="app" class="flex flex-col flex-grow">
        @include('layout.header')
        <main class="flex-grow overflow-hidden">
            @yield('content')
        </main>
        @include('layout.footer')
    </div>
    @yield('scripts')
</body>


</html>