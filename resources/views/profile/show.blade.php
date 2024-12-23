<body style="background-image: url('{{ asset('images/vinyl.jpg') }}'); background-size: cover; background-repeat: no-repeat;">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div id="profile-page" class="container">
        <!-- Profile Information Section -->
        <div class="profile-section">
            <div class="card">
                <div class="card-header">
                    Profile Information
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('user-profile-information.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="form-control" required>
                        </div>

                        <!-- Profile Photo -->
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="mb-3">
                                <label for="photo" class="form-label">Profile Photo</label>
                                <div class="profile-photo-container mb-3">
                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="rounded-circle">
                                </div>
                                <input type="file" id="photo" name="photo" class="form-control">
                            </div>
                        @endif

                        <button type="submit" class="btn btn-save">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Password Section -->
        <div class="profile-section">
            <div class="card">
                <div class="card-header">
                    Update Password
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('user-password.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="form-control" required>
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-save">Save</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Delete Account Section (if enabled) -->
        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <div class="profile-section">
                <div class="card">
                    <div class="card-header text-warning">
                        Delete Account
                    </div>
                    <div class="card-body">
                        @livewire('profile.delete-user-form')
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
</body>

