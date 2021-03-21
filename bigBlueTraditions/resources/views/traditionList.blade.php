@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('traditionList') }}" method="post" class="mb-4">
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
                    <label for="category" class="sr-only">Category</label>
                    <textarea name="category" id="category" class="bg-gray-100 
                    border-2 w-full p-4 rounded-lg @error('category') border-red-500 @enderror"
                    placeholder="Tradition category"></textarea>

                    @error('category')
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

            @if ($traditions->count())
                @foreach ($traditions as $tradition)
                    <div class="mb-4">
                        <p> {{ $tradition->name }} - {{ $tradition->description }}</p>
                        <p>Category: {{ $tradition->category }} Point Value:{{ $tradition->points }}</p>
                        <a class="bg-blue-100 mb-2" href="{{ route('completedTraditions') }}" class="p-3">Complete tradition!</a>
                    </div>
                @endforeach
            @else
                <p>There are no traditions.</p>
            @endif

        </div>
    </div>
@endsection