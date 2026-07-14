@extends('frontend.layouts.app')

@section('content')

<h2>

{{ $category->name }}

</h2>

@foreach($news as $item)

<div class="card mb-3">

<div class="card-body">

<h4>

{{ $item->title }}

</h4>

<p>

{{ Str::limit(strip_tags($item->description),150) }}

</p>

<a
href="{{ route('news.details',$item->slug) }}"
class="btn btn-primary">

Read More

</a>

</div>

</div>

@endforeach

{{ $news->links() }}

@endsection