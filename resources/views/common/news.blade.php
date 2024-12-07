@extends('layouts.app')

@section('title', 'Pokémon Pocket News')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/news.css') }}">
@endpush

@section('content')
    <section class="news-container">
        <h1>Pokémon Pocket News</h1>
        <div class="news-grid">
            @forelse ($newsItems as $news)
                <div class="news-card">
                    <img src="{{ $news['image'] }}" alt="{{ $news['title'] }}">
                    <div class="news-content">
                        <h3>{{ $news['title'] }}</h3>
                        <p>{{ $news['description'] }}</p>
                        <a href="{{ $news['link'] }}" target="_blank" class="read-more-btn">Read More</a>
                    </div>
                </div>
            @empty
                <p>No news available at the moment.</p>
            @endforelse
        </div>
    </section>
@endsection
