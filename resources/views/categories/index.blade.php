@extends('layout')

@section('content')
  <p>These are categories</p>

    <ul>
        @foreach ($categories as $category)
        <li>
            <a href="">{{ $category->title_en }}</a>
        </li>
        @endforeach
    </ul>

@endsection