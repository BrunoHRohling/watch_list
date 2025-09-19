<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch List App</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .container {
            @apply mx-40 my-4
        }

        .link {
            @apply decoration-blue-600 bg-blue-900 underline
        }

        .button {
            @apply border-2 p-2 rounded-lg font-bold
        }

        .navbar {
            @apply bg-blue-900 h-16
        }

        .page-title {
            @apply text-white p-4 font-bold text-xl
        }

        .search-filter {
            @apply flex flex-row
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')

</head>

<body>
    <div class="navbar">
        <div class="page-title">
            @yield('title')
        </div>
    </div>


        <div class="flex justify-center">
            <div class="container">
                @yield('content')
            </div>
        </div>
</body>

</html>
