@extends('layouts.app')

@section('title', 'Home')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
<section class="container mt-4">
    <!-- Carousel Section -->
    <section id="carouselSection" class="mb-4">
        <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/deckbuilder.jpg') }}" class="d-block w-100" alt="Deck Builder">
                    <div class="carousel-caption d-block">
                        <h5>Deck Builder</h5>
                        <p>Build your decks with ease using our advanced tools.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/gallery.jpg') }}" class="d-block w-100" alt="Pokédex">
                    <div class="carousel-caption d-block">
                        <h5>Pokédex Gallery</h5>
                        <p>Explore the complete Pokédex to know every card.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/news.jpg') }}" class="d-block w-100" alt="News & Events">
                    <div class="carousel-caption d-block">
                        <h5>News & Events</h5>
                        <p>Stay updated with the latest events and news.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/prem.jpg') }}" class="d-block w-100" alt="Premium Pass">
                    <div class="carousel-caption d-block">
                        <h5>Premium Pass</h5>
                        <p>Get exclusive access to premium features and rewards.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/forum.jpg') }}" class="d-block w-100" alt="Premium Pass">
                    <div class="carousel-caption d-block">
                        <h5>Forum</h5>
                        <p>Foster community connections with our forums page.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="text-center mb-4">
        <h1>Welcome to PockétDex</h1>
        <p>Discover cards, build decks, and connect with the community.</p>
    </section>

    <!-- Highlight Packs Section -->
    <section id="highlightPacks" class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ([
            ['title' => 'Mewtwo Booster Pack', 'description' => 'This pack contains special cards featuring Mewtwo.', 'image' => 'images/mewtwo.jpg'],
            ['title' => 'Pikachu Booster Pack', 'description' => 'This pack contains special cards featuring Pikachu.', 'image' => 'images/pikachu.jpg'],
            ['title' => 'Charizard Booster Pack', 'description' => 'This pack contains special cards featuring Charizard.', 'image' => 'images/charizard.jpg'],
            ['title' => 'Promo-A Pack', 'description' => 'This pack contains exclusive promo cards.', 'image' => 'images/promo.jpg']
        ] as $pack)
            <div class="col">
                <div class="card">
                    <img src="{{ asset($pack['image']) }}" alt="{{ $pack['title'] }}" />
                    <div class="card-overlay">
                        <h5>{{ $pack['title'] }}</h5>
                        <p>{{ $pack['description'] }}</p>
                        <button class="read-more-btn">Show Pack</button>
                    </div>
                </div>
            </div>
        @endforeach
    </section>    

    <!-- News Section -->
    <section id="newsSection" class="mt-4">
        <h2 class="text-center mb-4">Latest News</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach ([
                ['title' => 'PocketDex Update 1.1', 'description' => 'Discover the latest features and enhancements.', 'image' => 'images/pocketnews1.jpg'],
                ['title' => 'New Card Packs Released', 'description' => 'Check out the latest booster packs available now.', 'image' => 'images/pocketnews2.jpg']
            ] as $news)
            <div class="col">
                <div class="card news-card">
                    <img src="{{ asset($news['image']) }}" alt="{{ $news['title'] }}" class="card-img-top">
                    <div class="card-overlay">
                        <h5>{{ $news['title'] }}</h5>
                        <p>{{ $news['description'] }}</p>
                        <button class="read-more-btn">Read More</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
