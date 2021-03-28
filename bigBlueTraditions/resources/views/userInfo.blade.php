@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
        @auth
            User Information
            <br>
            Name: {{ auth()->user()->name }}
            <br>
            Username: {{ auth()->user()->username }}
            <br>
            Email: {{ auth()->user()->email }}
            <br>
            Points: {{ auth()->user()->points }}
            <br>
            <br>

            Completed Tradtitions: 
            @if ($completedTraditions->count())
                @foreach ($completedTraditions ?? '' as $completedTradition)
                    @if($completedTradition->user->name == auth()->user()->name)
                        <div class="mb-4">
                            <a herf="" class="font-bold">{{ $completedTradition->user->name }}</a><span class="text-gray-600 
                            text-sm">{{ $completedTradition->created_at->toDateString() }}</span>

                            <p class="mb-2"> {{ $completedTradition->body }}</p>
                        </div>
                    @endif
                @endforeach
            @else
                <p>You have not completed any traditions.</p>
            @endif

        @endauth
        </div>
    </div>
@endsection