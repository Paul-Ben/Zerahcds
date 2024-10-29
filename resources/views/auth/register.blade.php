{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.nuapp')
@section('content')
<style>
    .main_bg {
        background-image: url("{{asset('bg_image.jpg')}}"); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        min-height: 100vh;
    }
    .logo-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
  margin-top: 20px;
}

.logo {
  background-color: white;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.logo:hover {
  transform: scale(1.05);
}

h1 {
  color: #333;
  text-align: center;
}
</style>
<div>
    <div class="flex items-center justify-center min-h-screen bg-blue-100 widt main_bg" >
    <div> 
<div
class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

<div class="logo-container">
    <div class="logo">
        <svg width="120" height="60" viewBox="0 0 200 100">
            <defs>
                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%"
                    y2="0%">
                    <stop offset="0%" style="stop-color:#ff6b6b;stop-opacity:1" />
                    <stop offset="100%" style="stop-color:#4ecdc4;stop-opacity:1" />
                </linearGradient>
            </defs>
            <text x="50%" y="50%" font-family="Arial, sans-serif" font-size="48"
                fill="url(#grad1)" text-anchor="middle" dominant-baseline="middle">Zerah</text>
            <path d="M10 80 Q100 20 190 80" stroke="url(#grad1)" stroke-width="4"
                fill="none" />
        </svg>
    </div>
</div>
<form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md mx-auto">
    @csrf

    <!-- Name -->
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" 
               class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        @error('name')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" 
               class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        @error('email')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-4">
        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
        <input id="password" type="password" name="password" required autocomplete="new-password" 
               class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        @error('password')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
               class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        @error('password_confirmation')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center justify-between mt-6">
        <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900 underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Already registered?
        </a>
        <button type="submit" class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Register
        </button>
    </div>
</form>
</div>
</div>
</div>
</div>
@endsection