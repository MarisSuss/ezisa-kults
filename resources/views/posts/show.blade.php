@extends('layout')

@section('content')
<div class="max-w-md mx-auto mt-8 px-4">
  @if ($language === 'lv')
    <h2 class="text-2xl font-bold mb-2">{{ $post->title_lv }}</h2>
    <p class="text-gray-700">{{ $post->content_lv }}</p>
  @elseif ($language === 'en')
    <h2 class="text-2xl font-bold mb-2">{{ $post->title_en }}</h2>
    <p class="text-gray-700">{{ $post->content_en }}</p>
  @endif
</div>
@endsection