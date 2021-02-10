@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        @foreach($top as $key => $article)
            <div class="carousel-item @if($key == 0) {{ 'active' }} @endif">
                <a href="">
                    <img class="d-block w-100 carousel-img img-fluid" src="/storage/{{ $article->image }}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-jumbo text-bold">{{ $article->title }}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

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
            @endforeach
        </div>
    </div>
</div>
@endsection
 