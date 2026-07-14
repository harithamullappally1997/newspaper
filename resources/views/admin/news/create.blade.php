@extends('admin.layouts.app')

@section('content')

<h2>Add News</h2>

<form action="{{ route('admin.news.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="mb-3">

<label>Category</label>

<select name="category_id" class="form-control">

@foreach($categories as $category)

<option value="{{ $category->id }}">

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Title</label>

<input type="text"
name="title"
class="form-control">

</div>

<div class="mb-3">

<label>Image</label>

<input type="file"
name="image"
class="form-control">

</div>

<div class="mb-3">

<label>Description</label>

<textarea name="description"
rows="6"
class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Status</label>

<select name="status"
class="form-control">

<option value="1">Published</option>

<option value="0">Draft</option>

</select>

</div>

<button class="btn btn-success">

Save

</button>

</form>

@endsection