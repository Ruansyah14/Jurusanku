<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Seed some questions and answers for testing
        $question = Question::factory()->create([
            'question_text' => 'Apa minat Anda?',
        ]);

        Answer::factory()->createMany([
            ['question_id' => $question->id, 'answer_text' => 'Teknologi', 'score' => 10],
            ['question_id' => $question->id, 'answer_text' => 'Bisnis', 'score' => 5],
            ['question_id' => $question->id, 'answer_text' => 'Seni', 'score' => 3],
            ['question_id' => $question->id, 'answer_text' => 'Pendidikan', 'score' => 1],
        ]);
    }

    public function test_quiz_page_loads()
    {
        $response = $this->get('/quiz');
        $response->assertStatus(200);
        $response->assertSee('Quiz Minat dan Bakat');
    }

    public function test_submit_quiz_requires_answers()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/submit', [
            'answers' => '',
        ]);
        $response->assertRedirect('/quiz');
        $response->assertSessionHasErrors();
    }

    public function test_submit_quiz_and_view_results()
    {
        $user = User::factory()->create();

        $question = Question::first();
        $answer = Answer::where('question_id', $question->id)->first();

        $answers = json_encode([
            $question->id => $answer->id,
        ]);

        $response = $this->actingAs($user)->post('/submit', [
            'answers' => $answers,
        ]);

        $response->assertRedirect();
        $resultId = $response->headers->get('Location');
        $resultId = basename($resultId);

        $response = $this->actingAs($user)->get("/results/{$resultId}");
        $response->assertStatus(200);
        $response->assertSee('Hasil Rekomendasi Jurusan Kuliah');
    }
}
