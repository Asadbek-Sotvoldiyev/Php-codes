<?php

require_once "autoload.php";

$a = new Texteditor("myfile.txt");
echo "Eng uzun so'z: " . $a->long_word() . "\n";
echo "Eng ko'p takrorlangan so'z: " . $a->best_word() . "\n";
echo "Barcha imloviy belgilar: " . $a->notices();

