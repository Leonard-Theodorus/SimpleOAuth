@extends('layouts.mainlayout')

@section('content')
    @auth
        <div class="flex justify-center items-center h-96">
            <h1 class="text-black-300 font-bold text-5xl"> {{$message}} </h1>
        </div>
        <h2 class="border-dotted border-2 border-sky-900 w-full text-center py-4 text-2xl">Welcome {{$username}}</h2>
        @else
        <div class="flex flex-col items-center px-48 space-y-4 my-8">
            <h1 class="border-dotted border-2 border-sky-900 w-full text-center py-4 text-2xl">Login Using Various Methods Click The Button on the navbar</h1>
        </div>
    @endauth

@endsection
