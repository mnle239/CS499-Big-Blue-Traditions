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

            Completed Traditions: 
            @if ($completedTraditions->count())
                @if(auth()->user()->name == "Admin")
                    @foreach ($completedTraditions as $completedTradition)
                        <div class="mb-4">
                            <a herf="" class="font-bold">{{ $completedTradition->tradition->name }}</a><span class="text-gray-600 
                            text-sm">{{ $completedTradition->created_at->toDateString() }} Points Earned: {{$completedTradition->tradition->points}}</span>
                            </br><a herf="" class="font-bold">User: {{$completedTradition->user->email}}</a>
                            <img src="{{ Storage::url('product/' . $completedTradition->file_path) }}" style="max-width:300px;max-height:300px;border-radius:10px;"/>
                            

                            <p class="mb-2"> {{ $completedTradition->body }}</p>

                            <form name="deleteButton" id="deleteButton" action="{{route('userInfo') }}" method="post" class="mb-4">
                                @csrf
                                <div>
                                    <button name="deleteB" id="deleteB" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded 
                                    font-medium" value="{{ $completedTradition->body }}">Delete Tradition</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @else
                    @foreach ($completedTraditions as $completedTradition)
                        @if($completedTradition->user->id == auth()->user()->id)
                            <div class="mb-4">
                                <a herf="" class="font-bold">{{ $completedTradition->tradition->name }}</a><span class="text-gray-600 
                                text-sm">{{ $completedTradition->created_at->toDateString() }} Points Earned: {{$completedTradition->tradition->points}}</span>

                                <img src="{{ Storage::url('product/' . $completedTradition->file_path) }}" style="max-width:300px;max-height:300px;border-radius:10px;"/>
                                

                                <p class="mb-2"> {{ $completedTradition->body }}</p>
                            </div>
                        @endif
                    @endforeach
                @endif
            @else
                <p>You have not completed any traditions.</p>
            @endif

        @endauth
        </div>
    </div>
@endsection