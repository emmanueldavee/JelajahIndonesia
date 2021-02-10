@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-3 p-0 px-3 py-4">
                    <div class="card shadow-dark">
                        <a href="">
                            <img src="/storage/{{ $article->image }}" alt="{{ $article->title }}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($article->description, 100) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
 