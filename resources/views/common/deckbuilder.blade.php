@extends('layouts.app')

@section('title', 'Deck Builder')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/deckbuilder.css') }}">
@endpush

@section('content')
    <section class="deck-builder-container">
        <h1>Pokédeck Builder</h1>
        <div class="deck-builder-grid">
            
            <!-- Available Cards (left side) -->
            <div class="cards-selection">
                <div class="available-cards">
                    <!-- Header for Available Cards -->
                    <div class="available-cards-header">
                        <h2>Available Cards</h2>
                    </div>
                    
                    <!-- Search and Filters Section -->
                    <div class="filters">
                        <input type="text" id="searchInput" placeholder="Search for cards..." class="filter-input" oninput="applyFilters()" />
                        <select id="packFilter" class="filter-dropdown" onchange="applyFilters()">
                            <option value="">All Packs</option>
                            <option value="base1">Base Set</option>
                            <option value="xy1">XY Set</option>
                        </select>
                        <select id="typeFilter" class="filter-dropdown" onchange="applyFilters()">
                            <option value="">All Types</option>
                            <option value="Fire">Fire</option>
                            <option value="Water">Water</option>
                        </select>
                        <select id="trainerFilter" class="filter-dropdown" onchange="applyFilters()">
                            <option value="">All Trainers</option>
                            <option value="Ash">Ash</option>
                            <option value="Brock">Brock</option>
                        </select>
                    </div>

                    <!-- Cards Grid Section -->
                    <div class="cards-grid">
                        @forelse ($cards as $card)
                            <div class="card">
                                <img src="{{ $card['images']['small'] }}" alt="{{ $card['name'] }}">
                                <p>{{ $card['name'] }}</p>
                            </div>
                        @empty
                            <p>No cards available.</p>
                        @endforelse
                    </div>

                    <!-- Loading and No Cards Messages -->
                    <div id="loading" style="text-align: center; margin-top: 20px;">Loading cards...</div>
                    <div id="noCardsMessage" style="display: none; text-align: center; margin-top: 20px;">No cards match your search.</div>
                </div>
            </div>

            <!-- Deck (right side) -->
            <div class="deck-area" ondrop="drop(event)" ondragover="allowDrop(event)">
                <h2>Your Deck</h2>
                <p>Drag or click cards to add them here (limit: 2 per card).</p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Array to keep track of cards added to the deck
    window.deck = [];  

    // Allow cards to be dropped into the deck area
    window.allowDrop = function(event) {
        event.preventDefault();
    };

    // Handle dragging the card
    window.drag = function(event) {
        event.dataTransfer.setData("text", event.target.id);
    };

    // Handle dropping the card into the deck area
    window.drop = function(event) {
        event.preventDefault();
        const cardId = event.dataTransfer.getData("text");
        const card = document.getElementById(cardId);
        addCardToDeck(card);
    };

    // Handle clicking the card to add it to the deck
    window.addCardByClick = function(cardId) {
        const card = document.getElementById(cardId);
        addCardToDeck(card);
    };

    // Add a card to the deck
    function addCardToDeck(card) {
        const deckArea = document.querySelector('.deck-area');
        const cardId = card.getAttribute('data-id');

        // Count the number of times this card has been added to the deck
        const cardCount = window.deck.filter(item => item.id === cardId).length;

        if (cardCount < 2) {
            // Clone the card to avoid moving the original card
            const cardClone = card.cloneNode(true);

            // Remove drag and click functionality from the cloned card
            cardClone.removeAttribute('draggable');
            cardClone.removeAttribute('ondragstart');
            cardClone.removeAttribute('onclick');

            // Add the card clone to the deck area
            deckArea.appendChild(cardClone);

            // Add the card to the deck array for tracking
            window.deck.push({ id: cardId });
        } else {
            alert("You can only add 2 of each card!");
        }
    }

    // Add event listeners for all cards (not strictly necessary with the inline attributes)
    document.querySelectorAll('.card').forEach(card => {
        const cardId = card.getAttribute('id');

        // Add click event
        card.addEventListener('click', () => addCardByClick(cardId));

        // Add dragstart event
        card.addEventListener('dragstart', drag);
    });
</script>
@endpush

