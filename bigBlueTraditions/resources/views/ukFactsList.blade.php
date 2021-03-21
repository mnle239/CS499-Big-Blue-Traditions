@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('ukFactsList') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="description" class="sr-only">Fun Fact</label>
                    <textarea name="description" id="description" class="bg-gray-100 
                    border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                    placeholder="Enter fun fact"></textarea>

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

            @if ($facts->count())
                @foreach ($facts as $fact)
                    <div class="mb-4">
                        <p> {{ $fact->description }}</p>
                    </div>
                @endforeach
            @else
                <p>There are no fun facts.</p>
            @endif

        </div>
    </div>
@endsection