<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016.11.15.
 * Time: 13:14
 */

namespace Answerers\Tests;

use \Answerers\SOApi;
use Answerers\SOSearch;


class SOSearchTest extends \PHPUnit_Framework_TestCase
{


    public function testFirstPopularQuestion()
    {

        $fakeQuestions = [
            'items' => [
                [
                    'view_count' => 10,
                    'question_id' =>47518,
                ],
                [
                    'view_count' => 30,
                    'question_id' =>47568,
                ],
                [
                    'view_count' => 25,
                    'question_id' =>47248,
                ],
                [
                    'view_count' => 1,
                    'question_id' =>47549,
                ],
            ],
        ];


        $stub = $this->getMock(SOApi::class)->expects($this->once())->method('getQuestions')
            ->will($this->returnValue($fakeQuestions));
        
        $search = new SOSearch($stub);


        $this->assertEquals( [
            'view_count' => 30,
            'question_id' =>47568,
        ],$search->getFirstPopularQuestion());

    }
}