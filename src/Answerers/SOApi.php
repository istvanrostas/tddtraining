<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2016.11.15.
 * Time: 12:28
 */

namespace Answerers;


class SOApi
{


    public function getQuestions()
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_URL, 'http://api.stackexchange.com/2.2/questions/featured?order=desc&sort=activity&site=stackoverflow');
        $json = curl_exec($ch);
        curl_close($ch);

        return json_decode($json,true);

    }

    public function getAnswersByQuestionId($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_URL, 'https://api.stackexchange.com/2.2/questions/'. $id .'/answers?order=desc&sort=activity&site=stackoverflow');
        $json = curl_exec($ch);
        curl_close($ch);

        return json_decode($json,true);
    }
}