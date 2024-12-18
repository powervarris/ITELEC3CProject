@extends('layouts.app')

@section('title', 'Deck Discussion')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/discussion.css') }}">
@endpush

@section('content')
<section class="container-fluid my-4">
    <!-- Full-Width Header -->
    <div class="text-center mb-5 w-100">
        <h1 class="forum-header">Deck Discussion</h1>
    </div>

    <div class="container">
        <div class="row">
            <!-- Main Content Section -->
            <div class="col-lg-8 col-md-12">
                <!-- Create Thread Section -->
                <div class="card p-3 mb-4 shadow-sm rounded">
                    <form action="{{ route('forum.deck.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-2 align-items-center">
                            <div class="col-auto">
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle" alt="User Avatar" style="width: 50px; height: 50px;">
                            </div>
                            <div class="col">
                                <input type="text" name="content" class="form-control" placeholder="What's on your mind about Pokémon?" required />
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary shadow-sm px-4">Post</button>
                            </div>
                            <div class="col-12 d-flex gap-3 mt-2">
                                <input type="file" name="image" class="form-control" accept="image/*">
                                <input type="file" name="video" class="form-control" accept="video/*">
                            </div>
                        </div>
                    </form>
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
                @foreach($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <img src="{{ asset('images/mewtwo.jpg') }}" class="rounded-circle me-3" alt="Community Avatar" style="width: 50px; height: 50px;">
                                <div>
                                    <h6 class="mb-0">{{ $post->user->name }}</h6>
                                    <small class="text-muted">Posted by {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <p class="mt-3">{{ $post->content }}</p>
                            @if($post->image_path)
                                <img src="{{ asset('storage/' . $post->image_path) }}" class="img-fluid rounded" alt="Post Image">
                            @endif
                            @if($post->video_path)
                                <video controls class="img-fluid rounded">
                                    <source src="{{ asset('storage/' . $post->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                            <div class="mt-3 d-flex gap-3 btn-center">
                                <button class="btn btn-sm btn-link text-primary">
                                    <i class="bi bi-chat"></i> Comment
                                </button>
                                <button class="btn btn-sm btn-link text-primary">
                                    <i class="bi bi-reply"></i> Reply
                                </button>
                                @if(auth()->id() === $post->user_id)
                                    <form action="{{ route('forum.deck.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-link text-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                    <a href="#" class="btn btn-sm btn-link text-warning" data-bs-toggle="modal" data-bs-target="#editPostModal" onclick="populateEditForm({{ $post }})">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Right Sidebar -->
            <div class="col-lg-4 col-md-12">
                <!-- Popular Hashtags -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Popular Hashtags of This Week</h5>
                        <ul class="list-unstyled">
                            <li>
                                <span class="d-block">#DeckStrategies</span>
                                <small class="text-muted">18k Threads</small>
                            </li>
                            <li class="mt-2">
                                <span class="d-block">#MetaDecks</span>
                                <small class="text-muted">20k Threads</small>
                            </li>
                            <li class="mt-2">
                                <span class="d-block">#ComboDecks</span>
                                <small class="text-muted">15k Threads</small>
                            </li>
                            <li class="mt-2">
                                <span class="d-block">#StallTactics</span>
                                <small class="text-muted">10k Threads</small>
                            </li>
                            <li class="mt-2">
                                <span class="d-block">#DeckBuildingTips</span>
                                <small class="text-muted">12k Threads</small>
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
                            <span class="badge bg-light text-dark border">Deck Synergies</span>
                            <span class="badge bg-light text-dark border">Aggro Decks</span>
                            <span class="badge bg-light text-dark border">Control Strategies</span>
                            <span class="badge bg-light text-dark border">Combo Plays</span>
                            <span class="badge bg-light text-dark border">Meta Decks</span>
                            <span class="badge bg-light text-dark border">Beginner Tips</span>
                        </div>
                        <a href="#" class="btn btn-link text-primary fw-semibold p-0 mt-3">See all Topics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPostForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <input type="text" name="content" id="content" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="video" class="form-label">Video</label>
                        <input type="file" name="video" id="video" class="form-control" accept="video/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function populateEditForm(post) {
        document.getElementById('editPostForm').action = `/forum/deck/${post.id}`;
        document.getElementById('content').value = post.content;
    }
</script>
