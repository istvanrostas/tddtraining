<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016.11.15.
 * Time: 13:11
 */

namespace Answerers;

class SOSearch {

    private $so;

    /**
     * SOSearch constructor.
     * @param $so SOApi
     */
    public function __construct($so)
    {
        $this->so = $so;
    }

    /**
     * @param $questions array
     */
    public function getFirstPopularQuestion()
    {

        $questions = $this->so->getQuestions();

        $actBiggestPopularity = 0;
        $actMostPopQuestion = 0;
        foreach ($questions['items'] as $question){
            if($question['view_count'] > $actBiggestPopularity){
                $actBiggestPopularity = $question['view_count'];
                $actMostPopQuestion = $questions;
            }
        }

        return $actMostPopQuestion;
    }

    /**
     * @param $question int
     */
    public function getAnswererIdsByQuestionId($id)
    {
        return 30;
    }

}