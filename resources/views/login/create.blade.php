@extends('layout')

@section('content')
    <div class="max-w-md mx-auto mt-8">
        <form method="POST" action="{{ url(app()->getLocale() . '/login') }}" class="bg-white p-8 rounded shadow-md">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                <input  
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                    class="input-field border rounded-md p-2 w-full"
                >
                @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                <input  
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="input-field border rounded-md p-2 w-full"
                >
                @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me Checkbox (optional) -->
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-black">
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-black text-white hover:bg-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Login!</button>
            </div>
        </form>
    </div>
@endsection