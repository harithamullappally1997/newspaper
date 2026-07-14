@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <div class="row mb-4">
        <div class="col">
            <h2>Dashboard</h2>
            <p class="text-muted">Welcome, {{ Auth::user()->name }}</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm bg-primary text-white">
                <div class="card-body">
                    <h6>Total Categories</h6>
                    <h2>{{ $totalCategories }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm bg-success text-white">
                <div class="card-body">
                    <h6>Total News</h6>
                    <h2>{{ $totalNews }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm bg-info text-white">
                <div class="card-body">
                    <h6>Published News</h6>
                    <h2>{{ $publishedNews }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm bg-danger text-white">
                <div class="card-body">
                    <h6>Draft News</h6>
                    <h2>{{ $draftNews }}</h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Latest News Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Latest News</h5>
        </div>

        <div class="card-body">

            @if(count($latestNews) > 0)

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-light">

                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($latestNews as $news)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $news->title }}</td>

                            <td>
                                @if($news->status)

                                    <span class="badge bg-success">
                                        Published
                                    </span>

                                @else

                                    <span class="badge bg-warning">
                                        Draft
                                    </span>

                                @endif
                            </td>

                            <td>{{ $news->created_at->format('d M Y') }}</td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            @else

            <div class="text-center py-5">

                <h5>No News Available</h5>

                <p class="text-muted">
                    Add your first news article.
                </p>

            </div>

            @endif

        </div>

    </div>

</div>

@endsection