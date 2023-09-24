@extends('layouts.app')
@section('content')
    <h1>Segui i miei post</h1>
    <div class="jumbotron rounded-3">
        @forelse ($posts as $post)
            <div class="card mb-3">
                <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://marcolanci.it/utils/placeholder.jpg' }}"
                    class="card-img-top" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-title">{{ $post->created_at }}</h6>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-primary ms-2">Leggi di più</a>
                </div>
            </div>
    </div>
@empty
    <h3 class="text-center">Non Ci sono post</h3>
    @endforelse
@endsection

@section('script')
    @vite('resources/js/delete-confirmation.js')
@endsection
