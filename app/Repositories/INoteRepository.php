<?php

namespace App\Repositories;

interface INoteRepository
{
    public function sharedNotes();
    public function userNotes();
    public function storeNote($request);
    public function shareNote($id);
    public function destroyNote($id);

    //api
    public function allNotes();
}
