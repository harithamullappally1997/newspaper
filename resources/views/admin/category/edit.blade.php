@extends('admin.layouts.app')

@section('title','Edit Category')

@section('content')

<div class="container">

    <h2 class="mb-4">

        Edit Category

    </h2>

    <form
        action="{{ route('admin.categories.update',$category->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">

                Category Name

            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name',$category->name) }}">

            @error('name')

                <small class="text-danger">

                    {{ $message }}

                </small>

            @enderror

        </div>

        <button class="btn btn-primary">

            Update

        </button>

        <a href="{{ route('admin.categories.index') }}"
            class="btn btn-secondary">

            Back

        </a>

    </form>

</div>

@endsection