@extends('layout')

@section('content')
  <div class="max-w-2xl mx-auto my-8 p-6 bg-white rounded shadow-md">
    <h1 class="text-3xl font-semibold mb-6">Share your thoughts about this world</h1>
    
    <form method="POST" action="{{ url($language . '/posts/create') }}">
      @csrf
      
      @if ($language == 'lv')

        <label for="category_slug" class="block text-sm font-medium text-gray-600">Category</label>
        <select name="category_slug" id="category_slug" class="mt-1 p-2 block w-full border rounded-md" required>
            <option value="" disabled>Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->slug }}" {{ old('category_slug') == $category->slug ? 'selected' : '' }}>{{ $category->title_lv }}</option>
            @endforeach
        </select>

      @elseif ($language == 'en')

        <label for="category_slug" class="block text-sm font-medium text-gray-600">Category</label>
        <select name="category_slug" id="category_slug" class="mt-1 p-2 block w-full border rounded-md" required>
            <option value="" disabled>Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->slug }}" {{ old('category_slug') == $category->slug ? 'selected' : '' }}>{{ $category->title_en }}</option>
            @endforeach
        </select>

      @endif


      <div class="mb-4">
        <label for="title_lv" class="block text-sm font-medium text-gray-600">Title in Latvian</label>
        <input type="text" name="title_lv" id="title_lv" placeholder="e.g., My Great Thoughts" class="mt-1 p-2 block w-full border rounded-md" value="{{ old('title_lv') }}">
        @error('title_lv')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="title_en" class="block text-sm font-medium text-gray-600">Title in English</label>
        <input type="text" name="title_en" id="title_en" placeholder="e.g., My Great Thoughts" class="mt-1 p-2 block w-full border rounded-md" value="{{ old('title_en') }}">
        @error('title_en')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="content_lv" class="block text-sm font-medium text-gray-600">Content in Latvian</label>
        <textarea name="content_lv" id="content_lv" placeholder="e.g., Manas lieliskās domas par pasauli..." rows="5" class="mt-1 p-2 block w-full border rounded-md">{{ old('content_lv') }}</textarea>
        @error('content_lv')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-4">
        <label for="content_en" class="block text-sm font-medium text-gray-600">Content in English</label>
        <textarea name="content_en" id="content_en" placeholder="e.g., My great thoughts about the world..." rows="5" class="mt-1 p-2 block w-full border rounded-md">{{ old('content_en') }}</textarea>
        @error('content_en')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800 focus:outline-none focus:shadow-outline-gray active:bg-gray-900">Submit</button>

      @if ($errors->any())
        <div class="mt-4">
          <ul class="list-disc list-inside text-red-500">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

    </form>
  </div>
@endsection