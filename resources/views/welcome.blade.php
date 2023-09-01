@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            @forelse ($notes as $note)
                <div class="card text-start shadow me-3 mb-4" style="width: 20rem;">
                    <div class="card-body">
                        <h3 class="card-title">{{ $note->title }}</h3>
                        <p class="card-text">{{ $note->content }}</p>
                        <div class="row">
                            <small>{{ $note->updated_at }} por <i>{{ $note->user->name }}</i></small>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-danger">Nada que mostrar</p>
            @endforelse
        </div>
    </div>
@endsection
