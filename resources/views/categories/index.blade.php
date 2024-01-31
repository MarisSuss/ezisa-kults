@extends('layout')

@section('content')

    @auth
    <a href="{{ url($language . '/categories/create') }}">Create a new category</a>
    @endauth

    <p class="text-xl font-semibold mb-4">Categories</p>
    <ul>
        @foreach ($categories as $category)
            <li class="mb-2">
                <a href="" class="text-blue-500 hover:underline">{{ $category->title_en }}</a>
            </li>
        @endforeach
    </ul>
@endsection