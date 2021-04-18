@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <img src="{{url('stadium.jpg')}}" alt="" style="float:right">
            <b>Welcome to the Big Blue Traditions Checklist!</b>
            <br></br>
            <b>About:</b>
            <br></br>
            Click "traditions" to see the list of upcoming traditions at UK.
            <br></br>
            Submit your completed tradition to earn points toward prizes!
            <br></br>
        </div>
    </div>
@endsection