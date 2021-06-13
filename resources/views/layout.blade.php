<!doctype html>
<head>
    <title>Artisan UI</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('vendor/artisan-ui/artisan-ui.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="//unpkg.com/axios" defer></script>
</head>
<body>
    <main class="max-w-xl mx-auto py-12 px-8">
        <nav class="mb-12">
            <ul class="flex">
                <li class="mr-auto">Artisan UI</li>
                <li class="mr-3">All</li>
                <li class="mr-3">•</li>
                <li>Favorites</li>
            </ul>
        </nav>
        @yield('content')
    </main>
</body>
