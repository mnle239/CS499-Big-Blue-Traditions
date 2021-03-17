@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('completedTraditions') }}" method="post" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 
                    border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                    placeholder="Write about your experience."></textarea>

                    @error('body')
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

            @if ($completedTraditions->count())
                @foreach ($completedTraditions as $completedTradition)
                    <div class="mb-4">
                        <a herf="" class="font-bold">{{ $completedTradition->user->name }}</a><span class="text-gray-600 
                        text-sm">{{ $completedTradition->created_at->toDateString() }}</span>

                        <p class="mb-2"> {{ $completedTradition->body }}</p>
                    </div>
                @endforeach

                {{ $completedTraditions->links() }}
            @else
                <p>There are no completed traditions.</p>
            @endif

        </div>
    </div>
@endsection