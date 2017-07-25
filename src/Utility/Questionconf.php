<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Utility;

/**
 * Description of Questionconf
 *
 * @author Raed Alabsi
 */
class Questionconf {
    public static function loadconf($qtype){
        $qconf= [
            'truefalse' => [
                'hassubs' => FALSE,
                'answertype' => 'radio',
                'manyanswers' => FALSE,
                'isordering' => FALSE,
                'pbysub' => FALSE,
                'hasoptions' => FALSE,
                'answerlabel' => 'Correct answer'
            ],
            'multipleanswers' => [
                'hassubs' => TRUE,
                'answertype' => 'checkbox',
                'manyanswers' => FALSE,
                'isordering' => FALSE,
                'pbysub' => TRUE,
                'hasoptions' => FALSE,
                'answerlabel' => 'Correct',
                'subqtitle' => 'Choices'
            ],
            'multiplechoice' => [
                'hassubs' => TRUE,
                'answertype' => 'radiogroup',
                'manyanswers' => FALSE,
                'isordering' => FALSE,
                'pbysub' => FALSE,
                'hasoptions' => FALSE,
                'answerlabel' => 'Correct',
                'subqtitle' => 'Choices'
            ],
            'fillblanks' => [
                'hassubs' => TRUE,
                'answertype' => 'text',
                'manyanswers' => TRUE,
                'isordering' => FALSE,
                'pbysub' => TRUE,
                'hasoptions' => FALSE,
                'answerlabel' => 'Acceptable answers',
                'subqtitle' => 'Blank'
            ],
            'shortessay' => [
                'hassubs' => FALSE,
                'answertype' => 'textarea',
                'manyanswers' => FALSE,
                'isordering' => FALSE,
                'pbysub' => FALSE,
                'hasoptions' => FALSE,
                'answerlabel' => ''
            ],
            'wordbank' => [
                'hassubs' => TRUE,
                'answertype' => 'text',
                'manyanswers' => FALSE,
                'isordering' => FALSE,
                'pbysub' => TRUE,
                'hasoptions' => TRUE,
                'answerlabel' => 'Choice',
                'subqtitle' => 'Blank'
            ],
            'matching' => [
                'hassubs' => TRUE,
                'answertype' => 'text',
                'manyanswers' => FALSE,
                'isordering' => FALSE,
                'pbysub' => TRUE,
                'hasoptions' => TRUE,
                'answerlabel' => 'Match',
                'subqtitle' => 'Choice'
            ],
            'sequencing' => [
                'hassubs' => TRUE,
                'answertype' => 'text',
                'manyanswers' => FALSE,
                'isordering' => TRUE,
                'pbysub' => FALSE,
                'hasoptions' => TRUE,
                'answerlabel' => 'Correct order',
                'subqtitle' => NULL
            ],
            'instructions' => [
                'hassubs' => FALSE,
                'answertype' => 'none',
                'manyanswers' => FALSE,
                'isordering' => FALSE,
                'pbysub' => FALSE,
                'hasoptions' => FALSE,
                'answerlabel' => ''
            ],
            'project' => [
                'hassubs' => FALSE,
                'answertype' => 'file',
                'manyanswers' => FALSE,
                'isordering' => FALSE,
                'pbysub' => FALSE,
                'hasoptions' => FALSE,
                'answerlabel' => ''
            ],
            'general' => [
                'numofanswers' => 5,
                'numofsubs' => 10
            ]
        ];
        return $qconf[$qtype];

    }
}
