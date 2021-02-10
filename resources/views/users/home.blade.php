@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-6 p-4">
            <img src="/storage/{{ $articles[1]->image }}" alt="" class="w-100 max-5 rounded-lg">
        </div>
        <div class="col-6 px-4 py-5">
            <div class="heading mb-2">Greetings, <span class="text-bold">{{ auth()->user()->name }}!</span></div>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur officiis voluptatem, dolor quidem possimus earum hic deleniti obcaecati tempora ex, distinctio voluptatibus perspiciatis facere repellendus adipisci maxime recusandae! Dolorem, a!</p>
            <a href="{{url('/')}}" class="btn btn-primary mt-2">Explore more</a>
        </div>
    </div>
</div>
@endsection
 