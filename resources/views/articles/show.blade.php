@extends('layouts.app')

@section('content')
<img src="/storage/{{ $article->image }}" alt="{{ $article->title }}" class="w-100 max-5">

<div class="container pt-4">
    <div class="justify-content-center">
        <a href="{{ URL::previous() }}" class="d-block mb-2">Back</a>
        <h3>{{ $article->title }}</h3>
        <p>{{ $article->description }}</p>
    </div>
</div>
@endsection
 