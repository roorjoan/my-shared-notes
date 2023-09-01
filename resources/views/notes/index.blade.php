@extends('layouts.app')

@section('content')
    <div class="container">

        <!--Mostrando errores-->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li><strong>{{ $message }}</strong></li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </ul>
            </div>
        @endif

        <div class="row">

            <!--Formulario de guardado-->
            <form action="{{ route('notes.store') }}" method="post" id="myForm">
                @csrf
                <div class="row justify-content-start mb-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Título" name="title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="input-group mb-4">
                        <textarea class="form-control" placeholder="Contenido" name="content">{{ old('content') }}</textarea>
                    </div>
                </div>
            </form>

            <!--Tarjetas con las notas-->
            <div class="row justify-content-start">
                @forelse ($notes as $note)
                    <div class="card text-start shadow me-3 mb-4" style="width: 21rem;">
                        <div class="card-body">
                            <h3 class="card-title">{{ $note->title }}</h3>
                            <p class="card-text">{{ $note->content }}</p>
                            <div class="row">
                                <div class="input-group justify-content-end">

                                    <!--Compartir nota-->
                                    <form action="{{ route('notes.share', $note->id) }}" method="post" class="me-1">
                                        @csrf @method('PATCH')
                                        <button class="btn btn-primary btn-sm" type="submit">
                                            <i class="fa fa-share me-1" aria-hidden="true"></i>
                                            @if (!$note->shared)
                                                Compartir
                                            @else
                                                Dejar de compartir
                                            @endif
                                        </button>
                                    </form>

                                    <!--Eliminar nota-->
                                    <form action="{{ route('notes.destroy', $note) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm" type="submit">
                                            <i class="fa fa-trash me-1" aria-hidden="true"></i></a>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-danger">Nada que mostrar</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
