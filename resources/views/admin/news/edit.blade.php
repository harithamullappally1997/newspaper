@extends('admin.layouts.app')

@section('content')

<h2>Edit News</h2>

<form action="{{ route('admin.news.update',$news->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">
<label>Category</label>

<select name="category_id" class="form-control">

@foreach($categories as $category)

<option value="{{ $category->id }}"
{{ $news->category_id==$category->id?'selected':'' }}>

{{ $category->name }}

</option>

@endforeach

</select>
</div>

<div class="mb-3">
<label>Title</label>

<input type="text"
name="title"
value="{{ $news->title }}"
class="form-control">
</div>

@if($news->image)
<img src="{{ asset('uploads/news/'.$news->image) }}" width="120" class="mb-2">
@endif

<div class="mb-3">
<label>Change Image</label>

<input type="file" name="image" class="form-control">
</div>

<div class="mb-3">
<label>Description</label>

<textarea name="description" rows="6" class="form-control">{{ $news->description }}</textarea>
</div>

<div class="mb-3">
<label>Status</label>

<select name="status" class="form-control">
<option value="1" {{ $news->status ? 'selected' : '' }}>Published</option>
<option value="0" {{ !$news->status ? 'selected' : '' }}>Draft</option>
</select>
</div>

<button class="btn btn-primary">Update</button>

<a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Back</a>

</form>

@endsection