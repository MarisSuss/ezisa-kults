@extends('layout')

@section('content')
  <p>This is user {{ $user->name }}</p>

    <ul>
        @foreach ($posts as $post)
        <li>
            <a href="">{{ $post->title_en }}</a>
        </li>
        @endforeach
    </ul>

@endsection