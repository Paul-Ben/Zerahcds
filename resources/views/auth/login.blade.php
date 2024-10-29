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
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to our platform</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        email</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" autofocus
                        autocomplete="username"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="name@company.com" required />
                        <span class="text-red-500">{{ $errors->first('email') }}</span>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" autocomplete="current-password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required />
                        <span>{{ $errors->first('password') }}</span>
                </div>
                {{-- <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember_me" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                name="remember_me" />
                        </div>
                        <label for="remember_me" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                            me</label>
                    </div>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lost
                        Password?</a>
                    @endif    
                </div> --}}
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login
                    to your account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="{{route('register')}}" class="text-blue-700 hover:underline dark:text-blue-500">Create
                        account</a>
                </div>
            </form>
        </div>
    </div>
</div> 
</div>
</div>

 
@endsection
