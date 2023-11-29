<?php

namespace App\Repositories;

use App\Models\Note;

class NoteRepository implements INoteRepository
{
    public function sharedNotes()
    {
        return Note::with('user')->where('shared', 1)->latest('updated_at')->get();
    }

    public function userNotes()
    {
        return Note::with('user')->where('user_id', auth()->user()->id)->get();
    }

    public function storeNote($request)
    {
        $request['user_id'] = auth()->user()->id;

        return Note::create($request);
    }

    public function shareNote($id)
    {
        $note = Note::findOrFail($id);

        $note->shared = !$note->shared;
        $note->update();
    }

    public function destroyNote($id)
    {
        return Note::findOrFail($id)->delete();
    }

    public function allNotes()
    {
        return Note::with('user')->get();
    }
}
