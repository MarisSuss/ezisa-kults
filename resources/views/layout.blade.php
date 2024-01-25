<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('layout.title') }}</title>
    <!-- Tailwind -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <!-- Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>

<body class="bg-gray-100 text-black font-roboto">

    <nav class="bg-black text-white p-4 flex justify-between items-center">
        <!-- Larger Title -->
        <a href="{{ url(app()->getLocale()) }}" class="text-2xl font-semibold">{{ __('layout.title') }}</a>

        <!-- Navigation Links -->
        <div class="flex space-x-4">
            @auth
                <a href="{{ url(app()->getLocale()) . '/posts/create' }}" class="text-lg font-semibold">{{ __('layout.post') }}</a>
                <a href="{{ url(app()->getLocale()) . '/profile' }}" class="text-lg font-semibold">Welcome, {{ Auth::user()->name }}</a>
                <a href="{{ url(app()->getLocale()) . '/logout' }}" class="text-lg font-semibold">{{ __('layout.logout') }}</a>
            @endauth

            @guest
                <div>
                    <a href="{{ url(app()->getLocale()) . '/login' }}" class="text-lg font-semibold">{{ __('layout.login') }} /</a>
                    <a href="{{ url(app()->getLocale()) . '/register' }}" class="text-lg font-semibold">{{ __('layout.register') }}</a>
                </div>
            @endguest

            <!-- Language Switch Buttons -->
            <div class="flex space-x-2">
                <form action="{{ url('/lv/change-language') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:underline">LV</button>
                </form>
                <p>/</p>
                <form action="{{ url('/en/change-language') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:underline">EN</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8">
        @yield('content')
    </main>

    <!-- Flash for success -->
    <x-success-message />
</body>

</html>