@extends('layouts.app')

@section('title', 'About')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')
    <section class="about-container">
        <h1>About <span class="highlight">PockétDex</span></h1>
        <p class="intro">
            Welcome to <strong>PockétDex</strong> – your one-stop destination for everything Pokémon Trading Card Game! 
            Our goal is to foster a vibrant and welcoming community for Pokémon TCG enthusiasts. Whether you're a seasoned player 
            or a new trainer just starting your journey, this is the place for you!
        </p>
        
        <div class="about-section">
            <h2>Our Mission</h2>
            <p>
                We aim to create a website that not only provides information but also brings Pokémon TCG fans together. 
                Through our <span class="highlight">Forum</span>, players can connect, share strategies, and discuss their favorite cards and decks.
            </p>
        </div>

        <div class="about-section">
            <h2>What We Offer</h2>
            <div class="offer-list">
                <div class="offer-item">
                    <strong>Forum:</strong> Engage with other trainers, ask questions, and share your experiences.
                </div>
                <div class="offer-item">
                    <strong>News Articles:</strong> Stay updated with the latest Pokémon TCG news, events, and updates.
                </div>
                <div class="offer-item">
                    <strong>Tips and Tricks:</strong> Improve your gameplay with expert strategies and deck-building advice.
                </div>
                <div class="offer-item">
                    <strong>Deck Builder:</strong> Create and customize your perfect Pokémon TCG decks.
                </div>
            </div>
        </div>

        <div class="about-section">
            <h2>Join Our Community</h2>
            <p>
                Become a part of our growing community of Pokémon TCG trainers and fans. Let’s learn, grow, and have fun together!
                Explore the <span class="highlight">Forum</span>, read our <span class="highlight">News Articles</span>, and start building your dream decks!
            </p>
        </div>
    </section>
@endsection
