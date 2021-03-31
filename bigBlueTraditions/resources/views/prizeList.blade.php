@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                @if(auth()->user()->name == "Admin")
                <form action="{{route('prizeList') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="sr-only">Name</label>
                        <textarea name="name" id="name" class="bg-gray-100 
                        border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        placeholder="Prize name"></textarea>

                        @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="sr-only">Description</label>
                        <textarea name="description" id="description" class="bg-gray-100 
                        border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                        placeholder="Prize description"></textarea>

                        @error('description')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="points" class="sr-only">Points</label>
                        <textarea name="points" id="points" class="bg-gray-100 
                        border-2 w-full p-4 rounded-lg @error('points') border-red-500 @enderror"
                        placeholder="Prize point value"></textarea>

                        @error('points')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded 
                        font-medium">Submit</button>
                    </div>
                </form>
                @endif
            

                @if ($prizes->count())
                    @foreach ($prizes as $prize)
                        <div class="mb-4">
                            <p> {{ $prize->name }} - {{ $prize->description }}</p>
                            <p>Point Value:{{ $prize->points }}</p>

                            <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <div>
                                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-lightBlue-600 bg-lightBlue-200">
                                        Percent Complete
                                    </span>
                                </div>

                                <div class="text-right">
                                    <span class="text-xs font-semibold inline-block text-lightBlue-600">
                                        {{ (auth()->user()->points)/($prize->points) * 100 }}%
                                    </span>
                                </div>
                            </div>

                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                                <div style="width:{{ (auth()->user()->points)/($prize->points) * 100}}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                            </div>

                            
                            @if(auth()->user()->name == "Admin")
                            <form action="{{route('prizeList') }}" method="post" class="mb-4">
                                @csrf
                                <div>
                                    <button name="deleteB" id="deleteB" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded 
                                    font-medium" value="{{ $prize->name }}">Delete Prize</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    @endforeach
                @else
                    <p>There are no prizes.</p>
                @endif
            @endauth

        </div>
    </div>
@endsection