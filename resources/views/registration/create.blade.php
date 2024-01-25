@extends('layout')

@section('content')
    <div class="max-w-md mx-auto mt-8">
        <form method="POST" action="{{ url(app()->getLocale() . '/register') }}" class="bg-white p-8 rounded shadow-md">
            @csrf

            <!-- Username -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                <input  
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                    class="input-field border rounded-md p-2 w-full"
                >
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

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

            <!-- Password Confirmation -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Password Confirmation</label>
                <input  
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                    class="input-field border rounded-md p-2 w-full"
                >
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center">
                <button type="submit" class="bg-black text-white hover:bg-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Register!</button>
            </div>
        </form>
    </div>
@endsection