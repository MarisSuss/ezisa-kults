@extends('layout')

@section('content')
    <p>This a categorey</p>
  
    <ul>
        @foreach ($posts as $post)
        <li>
            <a href="">{{ $post->title_en }}</a>
        </li>
        @endforeach
    </ul>
@endsection