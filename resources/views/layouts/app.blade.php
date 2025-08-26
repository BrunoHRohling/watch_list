<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch List App</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .link {
            @apply decoration-amber-600 text-amber-800 underline
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')

</head>

<body class="max-w-7xl p-4">
    <h1>@yield('title')</h1>

    @yield('content')
</body>

</html>
