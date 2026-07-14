@extends('frontend.layouts.app')

@section('content')

<h2 class="mb-4">

Latest News

</h2>

<div class="row">

@foreach($latestNews as $news)

<div class="col-md-6 mb-4">

<div class="card h-100">

@if($news->image)

<img src="{{ asset('uploads/news/'.$news->image) }}"
height="220"
style="object-fit:cover;">

@endif

<div class="card-body">

<h5>

{{ $news->title }}

</h5>

<p>

{{ Str::limit(strip_tags($news->description),100) }}

</p>

<a
href="{{ route('news.details',$news->slug) }}"
class="btn btn-primary">

Read More

</a>

</div>

</div>

</div>

@endforeach

</div>

{{ $latestNews->links() }}

@endsection