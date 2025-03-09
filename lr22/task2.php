<!-- Функция для проверки, является ли год високосным -->
<?php
function task2($year) {
    // високосным годом считается тот, который делится на 4, а также не делится на 100 
    // (кроме случаев, когда он делится на 400), это мы и проверяем
    if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
        echo "$year является високосным годом.";
    } else {
        echo "$year не является високосным годом.";
    }
}
?>