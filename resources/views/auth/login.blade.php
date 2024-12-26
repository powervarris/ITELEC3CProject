<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Login | Pokémon TCG Pocket')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/loginregister.css') }}">

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Additional Styles -->
    @stack('styles')

    @if (Request::routeIs('profile.show'))
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    @endif

</head>
<body>
    <div class="background"></div>
    <div class="form-card">
        <h2>Log in</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="block">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block-remember mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            
            <div class="login-actions items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="forgot-link text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <div class="btn-group">
                    <a href="{{ route('register') }}" class="btn btn-secondary">
                        {{ __('Register') }}
                    </a>
                    <x-button class="btn btn-primary">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </div>                                    
        </form>
    </div>
</body>
</html>

