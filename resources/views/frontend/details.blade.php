@extends('frontend.layouts.app')

@section('content')

<h2>{{ $news->title }}</h2>

@if($news->image)

<img
src="{{ asset('uploads/news/'.$news->image) }}"
class="img-fluid mb-3">

@endif

{!! $news->description !!}

<hr>

<h4>

Recent News

</h4>

<ul>

@foreach($recentNews as $item)

<li>

<a href="{{ route('news.details',$item->slug) }}">

{{ $item->title }}

</a>

</li>

@endforeach

</ul>

@endsection