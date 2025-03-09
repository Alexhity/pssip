<?php
// Определение константы
define("NUM_E", 2.71828);

// Выводим значение константы
echo "Число e равно " . NUM_E . "<br>";

$num_e1 = NUM_E;

// Отображаем тип переменной
echo "Тип переменной num_e1: " . gettype($num_e1) . "<br>";

// Изменение типов переменной
$num_e1 = (string)$num_e1;
echo "Строка: " . $num_e1 . ", тип: " . gettype($num_e1) . "<br>";

$num_e1 = (int)$num_e1;
echo "Целое: " . $num_e1 . ", тип: " . gettype($num_e1) . "<br>";

$num_e1 = (bool)$num_e1;
echo "Булевский: " . $num_e1 . ", тип: " . gettype($num_e1) . "<br>";
?>
