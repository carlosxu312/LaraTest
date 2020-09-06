<?php

namespace Tests\Feature;

use App\Question;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewQuestionsTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
    public function user_can_view_questions()
    {
        // 抛出异常
        $this->withoutExceptionHandling();
        // 访问链接
        $test = $this->get('/questions');
        // 正常返回
        $test->assertStatus(200);
    }

    /** @test */
    public function user_can_view_a_single_question()
    {
        // 创建一个问题
        $question = factory(Question::class)->create();
        // 访问链接
        $test = $this->get('/questions/' . $question->id);
        // 正常返回200
        $test->assertStatus(200)
            ->assertSee($question->title)
            ->assertSee($question->content);
    }
}
