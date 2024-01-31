@extends('layout')

@section('content')
  <p>This is Home</p>


  <section>
      @foreach ($categories as $category)
        <option value="{{ $category->slug }}">{{ $category->title_en }}</option>
      @endforeach
  </section>


@endsection