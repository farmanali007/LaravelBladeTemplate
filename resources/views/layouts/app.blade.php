<html>
    <head>
        <title>{{ $settings['site_name'] ?? 'My Laravel App' }}</title>

    </head>
    <body>
        @include('partials.navbar')

        <div>
            @yield('content')
        </div>

        @include('partials.footer')
    </body>
</html>
