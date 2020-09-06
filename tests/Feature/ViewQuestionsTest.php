<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewQuestionsTest extends TestCase
{
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
}
