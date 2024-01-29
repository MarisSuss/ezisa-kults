@extends('layout')

@section('content')
<div class="max-w-md mx-auto mt-8 px-4">
  <p class="text-lg font-semibold mb-4">This is your Profile</p>
  <p class="mb-4">Your posts:</p>
  @foreach ($posts as $post)
    <div class="mb-4">
      @if ($language == 'lv')
        <a href="/lv/posts/{{ $post->slug }}" class="text-blue-600 hover:underline">{{ $post->title_lv }}</a>
      @elseif ($language == 'en')
        <a href="/en/posts/{{ $post->slug }}" class="text-blue-600 hover:underline">{{ $post->title_en }}</a>
      @endif
    </div>
  @endforeach
</div>
@endsection