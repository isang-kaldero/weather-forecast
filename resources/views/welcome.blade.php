@extends('layouts.main')

@section('content')
    <div class="w-full sm:w-1/2 mx-auto px-4">
        <p class="mb-4">
            Welcome to the weather forecast web application. Please login with your Github user to use the application and view
            the weather in your city.
        </p>
        
        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Log in</a>
    </div>
@endsection    
