@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                @if(auth()->user()->name == "Admin")
                <form action="{{route('resourceList') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="sr-only">Name</label>
                        <textarea name="name" id="name" class="bg-gray-100 
                        border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                        placeholder="Resource name"></textarea>

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
                        placeholder="Resource description"></textarea>

                        @error('description')
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
            @endauth

            @if ($resources->count())
                @foreach ($resources as $resource)
                    <div class="mb-4">
                        <p> {{ $resource->name }} - {{ $resource->description }}</p>
                        @auth
                            @if(auth()->user()->name == "Admin")
                            <form action="{{route('resourceList') }}" method="post" class="mb-4">
                                @csrf
                                <div>
                                    <button name="deleteB" id="deleteB" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded 
                                    font-medium" value="{{ $resource->name }}">Delete Resource</button>
                                </div>
                            </form>
                            @endif
                        @endauth
                    </div>
                @endforeach
            @else
                <p>There are no resources.</p>
            @endif


        </div>
    </div>
@endsection