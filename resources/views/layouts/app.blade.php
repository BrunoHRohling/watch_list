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

        .button {
            @apply border-2 p-1 rounded-xl font-bold 
        }

        .navbar {
            @apply bg-amber-800 h-16
        }

        .page-title {
            @apply text-white p-4 font-bold text-xl
        }

        .content {
            @apply p-4
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
            <div class="content">
                @yield('content')
            </div>
        </div>

</body>

</html>
