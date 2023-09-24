@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Modifica il Post</h1>
        <a class="btn btn-sm btn-secondary" href=" {{ route('admin.posts.index') }}"><i
                class="fas fa-arrow-left me-2"></i>Torna indietro
        </a>
    </header>
    <hr>
    <!-- FORM -->
    <form method="POST" action=" {{ route('admin.posts.update', $post) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del tuo post"
                        name="title" value="{{ old('title', $post->title) }}" maxlength="50" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto del Post</label>
                    <textarea class="form-control" id="content" rows="10" neme="content" required>{{ old('content', $post->content) }}</textarea>
                </div>
            </div>
            <div class="col-11">
                <div class="mb-3">
                    <label for="image" class="form-label">Copertina</label>
                    <input type="File" class="form-control" id="image" name="image"
                        placenolder="Inserisci un url valido">
                </div>
            </div>
            <div classe="col-1">
                <img src="{{ $post->image ? $post->getImagePath() : 'https://marcolanci.it/utils/placeholder.jpg' }}"
                    alt="preview" class="img-fluid" id="image-preview">
            </div>
        </div>
        <hr>
        <!-- BOTTONI -->
        <div class="d-flex justify-content-end mt-4">
            <button class="btn btn-success">
                <i class="fas fa-floppy-disk me-2"></i> Salva
            </button>
        </div>


    </form>
@endsection

@section('scripts')
    <script>
        const placeholder = 'https://marcolanci.it/utils/placeholder.jpg'
        const imageField = document.getElementById('image')
        const previewFilder = document.getElementById('image-preview')

        imageField.addEventListener('input', () => {
            previewFilder.src = imageField.value || placeholder;
        })
    </script>
@endsection
