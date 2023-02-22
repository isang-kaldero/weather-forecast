@extends('layouts.main')

@section('content')    
    <div class="w-full sm:w-1/2 mx-auto px-4">
        <h1 class="uppercase mb-2">{{ Auth::user()->name }}</h1>
         <p class="mb-4">
            https://github.com/{{ Auth::user()->nickname }}
        </p>        

        <weather-component></weather-component>
    </div>
@endsection    
