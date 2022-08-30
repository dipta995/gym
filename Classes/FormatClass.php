<?php
Class Format{
    public function formatDate($date){
        return date('F, j, Y, g:i A', strtotime($date));
    }

    public function textShorten($text, $limit = 400){
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . ".....";
        return $text;
    }

}
