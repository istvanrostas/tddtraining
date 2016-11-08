<?php
/**
 * Created by PhpStorm.
 * User: rosti
 * Date: 2016.11.08.
 * Time: 19:19
 */

class Parser
{
    public function parse($input)
    {
        $si = str_split($input);
        $ns = '';
        $open_s = false;
        $open_p = false;
        $open_i = false;
        for ($i = 0; $i <= (count($si) - 1);){
            if($si[$i] == '*' && $si[$i + 1] == '*' && !$open_s){
                $ns .= '<strong>';
                $open_s = true;
                if(isset($si[$i + 2])) $i+=2; else break;
            }
            elseif ($si[$i] == '*' && $si[$i + 1] == '*' && $open_s){
                $ns .= '</strong>';
                $open_s = false;
                if(isset($si[$i + 2])) $i+=2; else break;
            }elseif ($si[$i] == '`'){
                if(!$open_p) {
                    $ns .= '<pre>';
                    $open_p = true;
                }else{
                    $ns .= '</pre>';
                    $open_p = false;
                }
                $i++;
            }elseif ($si[$i] == '_'){
                if(!$open_i) {
                    $ns .= '<i>';
                    $open_i = true;
                }else{
                    $ns .= '</i>';
                    $open_i = false;
                }
                $i++;
            }
            else{
                $ns .= $si[$i];
                $i++;
            }


        }
        if(!($open_s || $open_p || $open_i))
            return $ns;
        else
            return false;
    }
}