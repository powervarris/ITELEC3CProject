<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pokémon TCG Pocket')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Additional Styles -->
    @stack('styles')

    @if (Request::routeIs('profile.show'))
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    @endif

</head>
<body>
<!-- Sidebar -->
@include('partials.navbar')

<!-- Main Content -->
<main style="padding: 20px;">
    {{ $slot ?? '' }} {{-- Jetstream compatibility --}}
    @yield('content')
</main>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endpush

<!-- Livewire Scripts -->
@livewireScripts

<!-- JavaScript -->
<script>
    const sidebar = document.getElementById('sidebar');
    const mediaQuery = window.matchMedia('(max-width: 991px)');

    mediaQuery.addEventListener('change', (e) => {
        if (e.matches) {
            sidebar.classList.add('collapsed');
        } else {
            sidebar.classList.remove('collapsed');
        }
    });

    if (mediaQuery.matches) {
        sidebar.classList.add('collapsed');
    } else {
        sidebar.classList.remove('collapsed');
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
