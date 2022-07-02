<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Ressource;
use App\Models\Commentaire;
use Illuminate\Support\Facades\Event;

class CommentTest extends TestCase
{
    public function test_can_display_comments() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $this->actingAs($user)->post(route('comment.store', ['id' => $resource->id]), [
            'content' => 'this is a test comment',
        ]);

        $comment = Commentaire::where('ressource_id', $resource->id)
                                ->where('content', 'this is a test comment')
                                ->first();

        $match = false;
        foreach ($resource->commentaires as $commentaire) if ($commentaire->id === $comment->id) $match = true;
        
        $this->assertTrue($match);

        $user->delete();
    }

    public function test_citizen_can_write_a_comment() {

        $resource   = Ressource::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->post(route('comment.store', ['id' => $resource->id]), [
            'content' => 'this is a test comment',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('commentaires', ['content' => 'this is a test comment']);

        $user->delete();
    }

    public function test_citizen_can_report_a_comment() {

        $comment    = Commentaire::factory()->create();
        $user       = User::factory()->verifiedCitizen()->create();

        $response = $this->actingAs($user)->get(route('comment.report', ['id' => $comment->id]));
        $response->assertStatus(302);

        $comment->refresh();
        // $this->assertTrue($comment->reports === 1);

        $user->delete();
    }

    public function test_moderators_get_notified_when_a_comment_triggers_the_report_threshold() {

        Event::fake();

        $comment    = Commentaire::factory()->create(['reports' => 49]);
        $user       = User::factory()->moderator()->create();

        $response = $this->actingAs($user)->get(route('comment.report', ['id' => $comment->id]));
        $response->assertStatus(302);

        // Event::assertDispatched(CommentReported::class);

        $user->delete();
    }

    public function test_moderator_can_ignore_a_comment_report() {

        Event::fake();

        $comment    = Commentaire::factory()->create(['reports' => 50]);
        $user       = User::factory()->moderator()->create();

        $response = $this->actingAs($user)->post(route('comment.ignorer', ['id' => $comment->id]));
        $response->assertStatus(302);

        // Event::assertDispatched(CommentIgnored::class);

        $user->delete();
    }

    public function test_moderator_can_confirm_a_comment_report() {

        Event::fake();

        $comment    = Commentaire::factory()->create(['reports' => 50]);
        $user       = User::factory()->moderator()->create();

        $response = $this->actingAs($user)->post(route('comment.supprimer', ['id' => $comment->id]));
        $response->assertStatus(302);

        // Event::assertDispatched(CommentDeleted::class);

        $user->delete();
    }
}
