<?php

namespace App\Src;


class Quiz 
{

    protected array $questions;

    protected $currentQuestion =1;

    
    public function addQuestion(Question $question)
    {

        $this->questions[] = $question;

    }

    public function nextQuestion()
    {

        $question =  $this->questions[$this->currentQuestion - 1];

        $this->currentQuestion++;

        return $question;

    }

    public function questions()
    {

        return $this->questions;

    }

    public function isComplete()
    {

       $answeredQuestions = count(array_filter($this->questions, fn($question) => $question->answered()));

       $totalQuestions = count($this->questions);

       return $answeredQuestions == $totalQuestions;

    }
    
    
    

    public function grade()
    { 

        if(! $this->isComplete()){
            throw new \Exception('This quiz has not yet been completed.');
        }
        
        
        $correct = count($this->correctlyAnsweredQuestions());

        return ($correct / count($this->questions)) * 100;

    }

    public function correctlyAnsweredQuestions()
    {
        return array_filter($this->questions,function($question){
            return $question->solved();
        });
    }
    
} 























?>