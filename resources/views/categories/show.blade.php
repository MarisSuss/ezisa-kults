@extends('layout')

@section('content')
    <p>This a categorey {{ $category->title_en }}</p>
  
    <ul>
        @foreach ($posts as $post)
        <li>
            <a href="">{{ $post->title_en }}</a>
        </li>
        @endforeach
    </ul>
@endsection