@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Crea un Post</h1>
        <a class="btn btn-sm btn-secondary" href=" {{ route('admin.posts.index') }}"><i
                class="fas fa-arrow-left me-2"></i>Torna indietro
        </a>
    </header>
    <hr>
    <form method="POST" action=" {{ route('admin.posts.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        <!-- FORM -->
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" placeholder="Inserisci il titolo del tuo post"
                        name="title" value="{{ old('title') }}" maxlength="50" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="content" class="form-label">Contenuto del Post</label>
                    <textarea class="form-control" id="content" rows="10" neme="content" required>{{ old('content') }}</textarea>
                </div>
            </div>
            <div class="col-11">
                <div class="mb-3">
                    <label for="image" class="form-label">Copertina</label>
                    <input type="File" class="form-control" id="image" name="image"
                        placeholder="Inserisci un immagine valida">
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

        let blobUrl = null;

        imageField.addEventListener('change', () => {

            // Controllo se ci sono file

            if (imageField.files && imageField.files[0]) {


                // Leggo il file
                const file = imageField[0];

                // Creo il blob del file
                blobUrl = URL.createObjectURL(file);

                previewFilder.src = blobUrl;
            } else {

                previewFilder.src = placeholder;
            }
        })

        window.addEventListener('beforeunload', () => {
            if (blobUrl) URL.revokeObjectURL(blobUrl);
        })
    </script>
@endsection
