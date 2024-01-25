<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('layout.title') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
</head>

<body class="bg-gray-100 text-black font-roboto">

    <nav class="flex justify-between items-center p-4 bg-black text-white">
        <a href="{{ url(app()->getLocale()) }}" class="text-lg font-semibold">{{ __('layout.title') }}</a>
        <a href="{{ url(app()->getLocale()) . '/register' }}" class="text-lg font-semibold">{{ __('layout.register') }}</a>

        <div class="flex space-x-4">
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
    </nav>

    <main class="container mx-auto mt-8">
        @yield('content')
    </main>

</body>

</html>
