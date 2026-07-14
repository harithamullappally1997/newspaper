@extends('admin.layouts.app')

@section('title','Add Category')

@section('content')

<div class="container">

    <h2 class="mb-4">Add Category</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">

                Category Name

            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name') }}">

            @error('name')

                <small class="text-danger">

                    {{ $message }}

                </small>

            @enderror

        </div>

        <button class="btn btn-success">

            Save

        </button>

        <a href="{{ route('admin.categories.index') }}"
            class="btn btn-secondary">

            Back

        </a>

    </form>

</div>

@endsection