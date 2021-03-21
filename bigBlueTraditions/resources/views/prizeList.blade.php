@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('prizeList') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <textarea name="name" id="name" class="bg-gray-100 
                    border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                    placeholder="Tradition name"></textarea>

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
                    placeholder="Tradition description"></textarea>

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
                    placeholder="Tradition point value"></textarea>

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

            @if ($prizes->count())
                @foreach ($prizes as $prize)
                    <div class="mb-4">
                        <p> {{ $prize->name }} - {{ $prize->description }}</p>
                        <p>Point Value:{{ $prize->points }}</p>
                    </div>
                @endforeach
            @else
                <p>There are no prizes.</p>
            @endif

        </div>
    </div>
@endsection