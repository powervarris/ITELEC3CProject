@extends('layouts.app')

@section('title', 'Gallery')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
@endpush

@section('content')
    <section class="gallery-container">
        <h1>Pokémon Card Gallery</h1>

        <!-- Search and Filters -->
        <form method="GET" action="{{ route('gallery') }}" class="filters-form">
            <div class="filters">
                <input type="text" id="searchInput" placeholder="Search for cards..." oninput="applyFilters()">

                <select name="pack" id="packFilter" onchange="applyFilters()">
                    <option value="">All Packs</option>
                    <option value="base1">Base Set</option>
                    <option value="xy1">XY Set</option>
                </select>

                <select name="type" id="typeFilter" onchange="applyFilters()">
                    <option value="">All Types</option>
                    <option value="Fire">Fire</option>
                    <option value="Water">Water</option>
                </select>

                <select name="trainer" id="trainerFilter" onchange="applyFilters()">
                    <option value="">All Trainers</option>
                    <option value="Ash">Ash</option>
                    <option value="Brock">Brock</option>
                </select>
            </div>
        </form>

        <!-- Cards Grid -->
        <div class="card-grid" id="card-grid"></div>

        <!-- Loading and No Cards Found Message -->
        <div id="message" style="display: none; text-align: center; margin-top: 20px;">
            <p id="message-text"></p>
        </div>
    </section>

<script>
    let currentPage = 1;
    let isLoading = false;
    const messageDiv = document.getElementById('message');
    const messageText = document.getElementById('message-text');

    function loadCards(page) {
        if (isLoading) return;

        isLoading = true;
        messageText.textContent = "Loading more cards...";
        messageDiv.style.display = 'block';

        // Construct query parameters for filters
        const searchParams = new URLSearchParams();
        searchParams.append('page', page);
        searchParams.append('pageSize', 10);

        const searchInput = document.getElementById('searchInput').value;
        const packFilter = document.getElementById('packFilter').value;
        const typeFilter = document.getElementById('typeFilter').value;
        const trainerFilter = document.getElementById('trainerFilter').value;

        if (searchInput) {
            searchParams.append('search', searchInput);
        }
        if (packFilter) {
            searchParams.append('pack', packFilter);
        }
        if (typeFilter) {
            searchParams.append('type', typeFilter);
        }
        if (trainerFilter) {
            searchParams.append('trainer', trainerFilter);
        }

        fetch(`/gallery?${searchParams.toString()}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Failed to fetch data');
                }
                return response.json();
            })
            .then((data) => {
                const cardGrid = document.getElementById('card-grid');

                if (data.cards.length > 0) {
                    data.cards.forEach((card) => {
                        const cardElement = document.createElement('div');
                        cardElement.classList.add('card');
                        cardElement.innerHTML = `
                            <img src="${card.images?.large || 'https://via.placeholder.com/200x280'}" alt="${card.name}">
                            <h3>${card.name}</h3>
                            <p>${card.set?.name || 'Unknown Set'}</p>
                        `;
                        cardGrid.appendChild(cardElement);
                    });
                    messageDiv.style.display = 'none';
                } else if (page === 1) {
                    messageText.textContent = "No cards found for your search.";
                    messageDiv.style.display = 'block';
                } else {
                    messageText.textContent = "There are no more cards to display.";
                    messageDiv.style.display = 'block';
                }

                currentPage++;
                isLoading = false;
            })
            .catch((error) => {
                console.error('Error loading cards:', error);
                messageText.textContent = "Something went wrong. Please try again.";
                messageDiv.style.display = 'block';
                isLoading = false;
            });
    }

    // Infinite scroll handler
    window.addEventListener('scroll', () => {
        const { scrollTop, scrollHeight, clientHeight } = document.documentElement;

        if (scrollTop + clientHeight >= scrollHeight - 50 && !isLoading) {
            loadCards(currentPage + 1);
        }
    });

    // Apply filters on any change
    function applyFilters() {
        currentPage = 1;
        document.getElementById('card-grid').innerHTML = '';
        loadCards(currentPage);
    }

    // Initialize cards on page load
    document.addEventListener('DOMContentLoaded', () => {
        loadCards(currentPage);
    });
</script>
@endsection
