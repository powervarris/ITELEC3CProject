@extends('layouts.app')

@section('title', 'Forum Filters')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/forum.css') }}">
@endpush

@section('content')
    <section class="forum-container">
        <h1>Pokémon Forums</h1>
        <div class="filters-grid">
            <div class="filter-block general" onclick="window.location.href='{{ url('/forum/general') }}'">
                <div class="title">General Discussion</div>
                <div class="description">Talk about anything Pokémon related! Whether it's your favorite Pokémon, upcoming releases, or anything in between!</div>
            </div>
            <div class="filter-block deck" onclick="window.location.href='{{ url('/forum/deck') }}'">
                <div class="title">Deck Discussion</div>
                <div class="description">Discuss strategies and build your perfect deck. Share tips, tricks, and card synergies to improve your gameplay.</div>
            </div>
            <div class="filter-block pokecard" onclick="window.location.href='{{ url('/forum/card') }}'">
                <div class="title">Card Discussion</div>
                <div class="description">Dive deep into Pokémon cards and their abilities. Learn about new releases, trading tips, and how to get the most out of your cards.</div>
            </div>
        </div>
    </section>
@endsection
