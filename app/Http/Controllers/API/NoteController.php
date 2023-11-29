<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;
use App\Repositories\INoteRepository;

class NoteController extends Controller
{
    public function __construct(
        private INoteRepository $noteRepository
    ) {
    }

    public function allNotes()
    {
        $notes = $this->noteRepository->allNotes();

        return NoteResource::collection($notes);
    }

    public function sharedNotes()
    {
        $notes = $this->noteRepository->sharedNotes();

        return NoteResource::collection($notes);
    }

    public function shareNote($id)
    {
        $this->noteRepository->shareNote($id);

        return response()->json(['status' => 'ok'], 200);
    }

    public function destroyNote($id)
    {
        $this->noteRepository->destroyNote($id);

        return response()->noContent();
    }

    public function store(NoteRequest $request)
    {
        //TODO
    }
}
