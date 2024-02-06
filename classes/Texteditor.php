<?php

interface Text {
    public function long_word();
    public function best_word();
    public function notices();
}

class Texteditor implements Text {
    public $letters = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890 ";
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function long_word()
    {
        $myfile = fopen($this->text, "r");
        $a = fread($myfile, filesize($this->text));
        fclose($myfile);
        $text_array = explode(" ", $a);
        $count_array = [];
        foreach ($text_array as $i) {
            array_push($count_array, strlen($i));
        }
        foreach ($text_array as $i) {
            if (strlen($i) === max($count_array)) {
                return $i;
            }
        }
    }

    public function best_word()
    {
        $myfile = fopen($this->text, "r");
        $a = fread($myfile, filesize($this->text));
        fclose($myfile);
        $arr_words = explode(" ", $a);
        $count_words = [];
        foreach ($arr_words as $i) {
            $count = 0;
            for ($j = 0; $j < count($arr_words); $j++) {
                if ($i === $arr_words[$j]) {
                    $count++;
                }
            }
            array_push($count_words, $count);
        }
        foreach ($arr_words as $i) {
            $count = 0;
            for ($j = 0; $j < count($arr_words); $j++) {
                if ($i === $arr_words[$j]) {
                    $count++;
                }
            }
            if ($count === max($count_words)) {
                return $i;
            }
        }
    }

    public function notices()
    {
        $myfile = fopen($this->text, "r");
        $a = fread($myfile, filesize($this->text));
        fclose($myfile);
        $words = str_split($a);
        $notice = [];
        foreach ($words as $i) {
            if (!in_array($i, str_split($this->letters))) {
                array_push($notice, $i);
            }
        }
        return implode("", $notice);
    }
}
