<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Repositories\INoteRepository;

class NoteController extends Controller
{
    public function __construct(
        private INoteRepository $noteRepository
    ) {
    }

    public function shared()
    {
        $notes = $this->noteRepository->sharedNotes();

        return view('welcome', compact('notes'));
    }

    public function index()
    {
        $notes = $this->noteRepository->userNotes();

        return view('notes.index', compact('notes'));
    }

    public function store(NoteRequest $request)
    {
        $this->noteRepository->storeNote($request->all());

        return to_route('notes.index');
    }

    public function share($id)
    {
        $this->noteRepository->shareNote($id);

        return to_route('notes.index');
    }

    public function destroy($id)
    {
        $this->noteRepository->destroyNote($id);

        return to_route('notes.index');
    }
}
