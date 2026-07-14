<!DOCTYPE html>
<html>

<head>

    <title>Online Newspaper</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">

            📰 Online Newspaper

        </a>

        <form action="{{ route('news.search') }}" method="GET" class="d-flex">

            <input
                type="text"
                name="keyword"
                class="form-control me-2"
                placeholder="Search News">

            <button class="btn btn-success">

                Search

            </button>

        </form>

    </div>

</nav>

<div class="container mt-4">

    <div class="row">

        <div class="col-md-3">

            <div class="card">

                <div class="card-header">

                    Categories

                </div>

                <ul class="list-group list-group-flush">

                    @foreach($categories as $category)

                    <li class="list-group-item">

                        <a href="{{ route('category.news',$category->id) }}">

                            {{ $category->name }}

                        </a>

                    </li>

                    @endforeach

                </ul>

            </div>

        </div>

        <div class="col-md-9">

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>