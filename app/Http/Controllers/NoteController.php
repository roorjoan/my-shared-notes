<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;

class NoteController extends Controller
{
    public function shared()
    {
        $notes = Note::with('user')->where('shared', 1)->latest('updated_at')->get();

        return view('welcome', compact('notes'));
    }

    public function index()
    {
        $notes = Note::with('user')->where('user_id', auth()->user()->id)->get();

        return view('notes.index', compact('notes'));
    }

    public function store(NoteRequest $request)
    {
        Note::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return to_route('notes.index');
    }

    public function share($id)
    {
        $note = Note::findOrFail($id);

        $note->shared = ! $note->shared;
        $note->update();

        return to_route('notes.index');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return to_route('notes.index');
    }
}
