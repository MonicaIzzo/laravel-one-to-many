@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Posts</h1>
        <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Crea un nuovo Post</a>
    </header>
    <hr>
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il</th>
                <th scope="col">Ultima modifica</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @forelse($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->create_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <div class="d-flex justify-content-end">

                            <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-sm btn-primary ms-2"><i
                                    class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-warning ms-2"><i
                                    class="fas fa-pencil"></i></a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="ms-2">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger delete-form"><i class="fas fa-trash"></i></button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6"></td>
                    <h3>Non ci sono post</h3>
                </tr>
            @endforelse

            @section('scripts')
                @vite('resources/js/delete-confirmation.js')
            @endsection

        </tbody>
    </table>


@endsection
