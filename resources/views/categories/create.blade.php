@extends('layout')

@section('content')

<form method="POST" action="{{ url($language . '/categories/create') }}" class="mb-8">
    @csrf
    <div class="mb-4">
        <label for="title_lv" class="block text-sm font-medium text-gray-600 mb-1">Title in Latvian</label>
        <input type="text" name="title_lv" id="title_lv" placeholder="e.g., My Great Thoughts" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title_lv') }}">
        @error('title_lv')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <label for="title_en" class="block text-sm font-medium text-gray-600 mb-1 mt-4">Title in English</label>
        <input type="text" name="title_en" id="title_en" placeholder="e.g., My Great Thoughts" class="mt-1 p-2 block w-full border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('title_en') }}">
        @error('title_en')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button type="submit" class="mt-4 px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 active:bg-gray-900">Submit</button>
    </div>
</form>


@endsection