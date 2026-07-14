@extends('admin.layouts.app')

@section('title','Categories')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2>Categories</h2>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            Add Category
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead class="table-dark">

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th width="180">Action</th>

            </tr>

        </thead>

        <tbody>

        @forelse($categories as $category)

            <tr>

                <td>{{ $category->id }}</td>

                <td>{{ $category->name }}</td>

                <td>

                    <a href="{{ route('admin.categories.edit',$category->id) }}"
                        class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form
                        action="{{ route('admin.categories.destroy',$category->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this category?')">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="3" class="text-center">

                    No Categories Found

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection