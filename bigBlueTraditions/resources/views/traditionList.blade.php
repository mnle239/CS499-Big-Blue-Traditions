@extends('layout.app')

@section('content')
<div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @auth
                @if(auth()->user()->id == 1)
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

                    <div class="mb-4">
                        <label for="link" class="sr-only">Additional Link</label>
                        <textarea name="link" id="link" class="bg-gray-100 border-2 w-full p-4 rounded-lg"
                        placeholder="Link to resource homepage"></textarea>
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded 
                        font-medium">Submit</button>
                    </div>
                </form>
                @endif
            @endauth


            <div x-data="{ openTab: 1 }" class="p-6">
                <ul class="flex border-b">
                    @php ($i = 1)
                    @foreach ($categories as $category)
                    
                        <li @click="openTab = {{ $i }}" :class="{ '-mb-px': openTab === {{ $i }} }" class="-mb-px mr-1">
                            <a :class="openTab === {{ $i }} ? 'border-l border-t border-r rounded-t text-blue-700' : 'text-blue-500 hover:text-blue-800'" 
                            class="bg-white inline-block py-2 px-4 font-semibold" href="#">
                                {{ $category }}
                            </a>
                        </li>
                        @php ($i = $i +1)
                    @endforeach
                </ul>

                <div class="w-full pt-4">
                    @for ($i = 0; $i < count($sortedTraditions); $i++)
                        <div x-show="openTab === {{ $i+1 }}">
                            @if ($sortedTraditions[$i]->count())
                                @foreach ($sortedTraditions[$i] as $tradition)
                                    <div class="mb-4">
                                        <p> {{ $tradition->name }} - {{ $tradition->description }}</p>
                                        <p>Category: {{ $tradition->category }} Point Value:{{ $tradition->points }}</p>

                                        @if ($tradition->link)
                                            <a href = "{{ $tradition->link }}"  class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600">More Information</a>
                                        @endif
                                        <a class="bg-blue-100 mb-2" href="{{ route('completedTraditions', $tradition) }}"class="p-3">Complete tradition!</a>
                                        @auth
                                            @if(auth()->user()->id == 1)
                                            <form name="deleteButton" id="deleteButton" action="{{route('traditionList') }}" method="post" class="mb-4">
                                            @csrf
                                            <div>
                                                <button name="deleteB" id="deleteB" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded 
                                                font-medium" value="{{ $tradition->name }}">Delete Tradition</button>
                                            </div>
                                            </form>
                                            @endif
                                        @endauth
                                    </div>
                                @endforeach
                            @else
                                <p>There are no traditions.</p>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Alpine.js--> 
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        </div>
    </div>
@endsection