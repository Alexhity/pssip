<?php
function task6($a, $b, $c, $x) {
    try { //обработка исключения
		// проверка условий для вычислений
        if ($a < 0 && $c != 0) {
            return $a * pow($x, 2) + $b * $x + $c; // Квадратная формула
        } elseif ($a > 0 && $c == 0) {
            if ($x - $c == 0) {
                throw new Exception("Ошибка деления на ноль."); // Генерация исключения при делении на 0
            }
            return -$a / ($x - $c);
        } else {
            return $a * ($x + 1); // Пример с t=1
        }
    } catch (Exception $e) {
        return "Ошибка: " . $e->getMessage();
    }
}
?>
