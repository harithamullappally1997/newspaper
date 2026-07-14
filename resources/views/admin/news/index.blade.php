@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">

<h2>News</h2>

<a href="{{ route('admin.news.create') }}" class="btn btn-primary">
Add News
</a>

</div>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>

<th>Image</th>

<th>Title</th>

<th>Category</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($news as $item)

<tr>

<td>{{ $item->id }}</td>

<td>

@if($item->image)

<img src="{{ asset('uploads/news/'.$item->image) }}"
width="80">

@endif

</td>

<td>{{ $item->title }}</td>

<td>{{ $item->category->name }}</td>

<td>

@if($item->status)

<span class="badge bg-success">Published</span>

@else

<span class="badge bg-danger">Draft</span>

@endif

</td>

<td>

<a href="{{ route('admin.news.edit',$item->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('admin.news.destroy',$item->id) }}"
method="POST"
class="d-inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Delete?')">

Delete

</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

@endsection