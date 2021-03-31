@extends('layout.app')

@section('content')

@if ($errors->any())
   <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
     @endforeach
     </ul>
   </div>
@endif

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('completedTraditions', $tradition) }}" method="post" class="mb-4" enctype="multipart/form-data">
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

                <div class="form-group">
                    <input type="file" name="file" required>
                </div>

                <input type="hidden" id="tradition" name="tradition" value={{$tradition}}>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded 
                    font-medium">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection