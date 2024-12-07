@extends('layouts.app')

@section('title', 'Card Discussion')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/discussion.css') }}">
@endpush

@section('content')
<section class="container-fluid my-4">
    <!-- Full-Width Header -->
    <div class="text-center mb-5 w-100">
        <h1 class="forum-header">Card Discussion</h1>
    </div>

    <div class="container">
        <div class="row">
            <!-- Main Content Section -->
            <div class="col-lg-8 col-md-12">
                <!-- Create Thread Section -->
                <div class="card p-3 mb-4 shadow-sm rounded">
                    <div class="row g-2 align-items-center">
                        <div class="col-auto">
                            <img src="{{ asset('images/charizard.jpg') }}" class="rounded-circle" alt="User Avatar" style="width: 50px; height: 50px;">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="What's your favorite Pokémon card strategy?" />
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary shadow-sm px-4">Post</button>
                        </div>
                        <div class="col-12 d-flex gap-3 mt-2">
                            <button class="btn btn-light btn-sm d-flex align-items-center gap-2 shadow-sm">
                                <i class="bi bi-image"></i> Add Image
                            </button>
                            <button class="btn btn-light btn-sm d-flex align-items-center gap-2 shadow-sm">
                                <i class="bi bi-camera-video"></i> Add Video
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tabs Section -->
                <ul class="nav nav-pills mb-4 justify-content-start">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="bi bi-file-earmark-text"></i> Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-folder"></i> Resources
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-chat-dots"></i> Discussions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-calendar-event"></i> Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-megaphone"></i> Announcement
                        </a>
                    </li>
                </ul>

                <!-- Posts Section -->
                <div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('images/gallery.jpg') }}" class="rounded-circle me-3" alt="Community Avatar" style="width: 50px; height: 50px;">
                                <div>
                                    <h6 class="mb-0">Rare Card Collectors</h6>
                                    <small class="text-muted">Posted by Misty • 10 min ago</small>
                                </div>
                            </div>
                            <p class="mt-3">What's your rarest Pokémon card and how did you get it?</p>
                            <img src="{{ asset('images/expansion.jpg') }}" class="img-fluid rounded" alt="Post Image">
                            <div class="mt-3 d-flex gap-3">
                                <button class="btn btn-sm btn-link text-primary">
                                    <i class="bi bi-chat"></i> Comment
                                </button>
                                <button class="btn btn-sm btn-link text-primary">
                                    <i class="bi bi-reply"></i> Reply
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-md-12">
                <!-- Popular Hashtags -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Popular Hashtags of This Week</h5>
                        <ul class="list-unstyled">
                            <li>
                                <span class="d-block">#RareCards</span>
                                <small class="text-muted">15k Threads</small>
                            </li>
                            <li class="mt-2">
                                <span class="d-block">#FullArtFinds</span>
                                <small class="text-muted">12k Threads</small>
                            </li>
                            <li class="mt-2">
                                <span class="d-block">#CardBattles</span>
                                <small class="text-muted">18k Threads</small>
                            </li>
                            <li class="mt-2">
                                <span class="d-block">#ShinyCharizard</span>
                                <small class="text-muted">20k Threads</small>
                            </li>
                            <li class="mt-2">
                                <span class="d-block">#CardTrades</span>
                                <small class="text-muted">10k Threads</small>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-link text-primary fw-semibold p-0">See all Hashtags</a>
                    </div>
                </div>

                <!-- Recommended Topics -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recommended Topics</h5>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-dark border">Pokémon Evolution</span>
                            <span class="badge bg-light text-dark border">Card Rarities</span>
                            <span class="badge bg-light text-dark border">Best Card Decks</span>
                            <span class="badge bg-light text-dark border">Legendary Cards</span>
                            <span class="badge bg-light text-dark border">Holofoil Tips</span>
                            <span class="badge bg-light text-dark border">Trade Strategies</span>
                        </div>
                        <a href="#" class="btn btn-link text-primary fw-semibold p-0 mt-3">See all Topics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
