@extends('layouts.app', ['page' => __('News'), 'pageSlug' => 'news'])

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card ">
        <div class="card-header">
            <form action="{{ route('news') }}" method="GET">
                <div class="input-group">
                    <div class="col-8">
                        <input type="string" name='search' class="form-control" id="search"
                            placeholder="Search for title or description">
                    </div>
                    <div class="col-4 text-right">
                        <button class="btn btn-sm" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">News</h4>
                        </div>

                        <div class="col-4 text-right">
                            <a href="news/add" class="btn btn-sm btn-primary">Add news</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $news)
                                    <tr>
                                        <td>{{ $news->title }}</td>
                                        <td class="text-truncate" style="max-width: 200px;">{{ $news->description }}</td>
                                        <td>{{ $news->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="{{ route('news_edit', ['id' => $news->id]) }}">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
