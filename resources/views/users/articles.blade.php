@extends('layouts.app')

@section('content')
<div class="container pt-4">
    <div class="justify-content-center">
        <div class="heading text-bold text-center">{{ $user->name }}</div>
        @if(!auth()->user()->isAdmin())
        <a href="{{ url('/articles/create') }}" class="btn btn-primary">+ Create Blog</a>
        @endif
        <div class="row">
            @forelse($articles as $article)
                <div class="col-3 p-0 px-3 py-4">
                    <div class="card shadow-dark">
                        <a href="{{url('articles', $article->id)}}">
                            <img src="/storage/{{ $article->image }}" alt="{{ $article->title }}" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($article->description, 100) }}</p>
                        </div>
                        @if(auth()->user() && ($article->user->id == auth()->user()->id || auth()->user()->isAdmin()))
                        <div class="card-footer">
                                <form action="/articles/{{ $article->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger">Delete</button>
                                </form>
                        </div>
                        @endif
                    </div>
                </div>
            @empty
            <h3>No Articles Yet.</h3>
            @endforelse
        </div>
    </div>
</div>
@endsection
 