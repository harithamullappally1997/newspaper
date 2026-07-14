@extends('frontend.layouts.app')

@section('content')

<h2>

Search Result :
{{ $keyword }}

</h2>

@forelse($news as $item)

<div class="card mb-3">

<div class="card-body">

<h4>

{{ $item->title }}

</h4>

<p>

{{ Str::limit(strip_tags($item->description),120) }}

</p>

<a
href="{{ route('news.details',$item->slug) }}"
class="btn btn-success">

Read More

</a>

</div>

</div>

@empty

<div class="alert alert-danger">

No News Found

</div>

@endforelse

{{ $news->links() }}

@endsection