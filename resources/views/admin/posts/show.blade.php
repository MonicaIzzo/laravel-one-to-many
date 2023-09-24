@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <h1>{{ $post->title }}</h1>
    <hr>
    <div class="clearfix">
        @if ($post->image)
            <img class="img-fluid float-start me-2" src="{{ $post->getImagePath() }}" alt="{{ $post->title }}" width="250">
        @endif
        <p>{{ $post->content }}</p>
        <div>
            <strong>Creato il: </strong>{{ $post->created_at }}<br>
            <strong>Ultima modifica: </strong>{{ $post->updated_at }}
        </div>
    </div>
    <hr>
    <footer class="d-flex justify-content-between">
        <div class="">
            <a href="{{ route('admin.posts.index', $post) }}" class="btn  btn-secondary"><i class="fa-solid fa-arrow-left"></i>
                Torna indietro</a>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning ms-2"><i class="fas fa-pencil"></i>
                Modifica</a>
            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="ms-2 delete-form">
                @method('DELETE')
                @csrf
                <button class="btn  btn-danger"><i class="fas fa-trash"></i> Elimina</button>
            </form>
        </div>
    </footer>
@endsection

@section('scripts')
    @vite('resources/js/delete-confirmation.js')
@endsection
