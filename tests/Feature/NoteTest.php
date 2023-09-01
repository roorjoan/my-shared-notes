<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Note;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NoteTest extends TestCase
{
    use RefreshDatabase;

    public function testCanSeeSharedNotes()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertViewIs('welcome')
            ->assertViewHas('notes', Note::all());
    }

    public function testCanSeeLoggedUserNotes()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/notes');

        $response->assertStatus(200)
            ->assertViewIs('notes.index')
            ->assertViewHas('notes', Note::all());
    }

    /*public function testCanStoreNotes()
    {
        $user = User::factory()->create();
        $note = [
            'user_id' => $user->id,
            'title' => 'note title',
            'content' => 'note content',
        ];

        $response = $this->actingAs($user)->post('/notes', $note);

        $response->assertStatus(302)
            ->assertRedirect(route('notes.index'));
        $this->assertDatabaseHas('notes', $note);
    }*/

    /*public function testCanChangeANoteToShared()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->patch("/notes/{$note->id}", [
            'shared' => true
        ]);

        $response->assertStatus(302)
            ->assertRedirect(route('notes.index'));

        $this->assertDatabaseCount('notes', 1);

        $noteUpdated = Note::first();
        $this->assertEquals(1, $noteUpdated->shared);
    }*/

    /*public function testCanDeleteANoteSuccessfully()
    {
        $user = User::factory()->create();
        $note = Note::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/notes/{$note->id}");

        $response->assertStatus(302)
            ->assertRedirect(route('notes.index'));

        $this->assertDatabaseMissing('notes', $note->toArray());
    }*/
}
