@extends('layout')

@section('content')

Search results for: {{ $search }}

<div class="flex flex-wrap">
    @foreach ($posts as $post)
        <div class="w-1/3 p-4">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ app()->getLocale() === 'en' ? $post->title_en : $post->title_lv }}</h2>
                    <p>{{ app()->getLocale() === 'en' ? $post->content_en : $post->content_lv }}</p>
                    <a href="{{ url(app()->getLocale() . '/posts/' . $post->slug) }}" class="block text right-0 bottom-0 p-4 bg-gray-800 text-white rounded-lg hover:bg-gray-700">{{ __('search.read_more') }}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>


@endsection