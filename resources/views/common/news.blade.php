@extends('layouts.app')

@section('title', 'Pokémon Pocket News')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/news.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    <section class="news-container">
        <h1>Pokémon Pocket News</h1>
        @auth
            @if (Auth::user()->role === 'admin')
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal">
                    Add News
                </button>
            @endif
        @endauth
        <div class="news-grid">
            @forelse ($newsItems as $news)
                <div class="news-card">
                    <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}">
                    <div class="news-content">
                        <h3>{{ $news->title }}</h3>
                        <p>{{ $news->description }}</p>
                        <div class="d-flex justify-content-between mt-2">
                            <a href="{{ $news->link }}" target="_blank" class="read-more-btn btn btn-primary">Read More</a>
                        @auth
                            @if (Auth::user()->role === 'admin')
                                    <form action="{{ route('news.destroy', $news->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <p>No news available at the moment.</p>
            @endforelse
        </div>
    </section>

    <div class="modal fade" id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewsModalLabel">Add News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div>
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div>
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image" required>
                        </div>
                        <div>
                            <label for="link">Link:</label>
                            <input type="url" id="link" name="link" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add News</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
