<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Src\Quiz;
use App\Src\Question;

class QuizTest extends TestCase
{
    /**
     * @test
     */

    public function it_consists_of_questions()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("What is 2 + 2?", 4));

        $this->assertCount(1, $quiz->questions());
    }

    /**
     * @test
     */

    public function it_grades_a_perfect_quiz()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("What is 2 + 2?", 4));

        $question = $quiz->nextQuestion();

        $question->answer(4);

        $this->assertEquals(100, $quiz->grade());
    }

    /**
     * @test
     */

    public function it_failed_a_quiz()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("What is 2 + 2?", 4));

        $question = $quiz->nextQuestion();

        $question->answer('incorrect answer');

        $this->assertEquals(0, $quiz->grade());
    }

    /**
     * @test
     */

    public function it_correctly_tracks_the_next_question_in_the_queue()
    {

         $quiz = new Quiz();

        $quiz->addQuestion($question1 = new Question("What is 2 + 2?", 4));

        $quiz->addQuestion($question2 = new Question("What is 3 + 3?", 6));

        $this->assertEquals($question1, $quiz->nextQuestion());
        
        $this->assertEquals($question2, $quiz->nextQuestion());

        
    }




    /**
     * @test
     */

    // public function it_return_false_if_there_are_no_remaining_next_questions()
    // {

    //      $quiz = new Quiz();

    //     $quiz->addQuestion($question1 = new Question("What is 2 + 2?", 4));

    //     $qu

        
    // }

    /**
     * @test
     */

    public function it_cannot_be_graded_until_all_questions_have_been_answered()
    {
        $quiz = new Quiz();

        $quiz->addQuestion(new Question("What is 2 + 2?", 4));

        $this->expectException(\Exception::class);

        $quiz->grade();
    }
}
