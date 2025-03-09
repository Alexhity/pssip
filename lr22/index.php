<?php
// Подключаем необходимые файлы с функциями
include 'task2.php';
include 'task3.php';
include 'task4.php';
include 'task5.php';
include 'task6.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Вариант 17</title>
</head>
<body>
<h1>Результаты лабораторной работы</h1>

    <!-- Вставляем результаты отдельных файлов здесь -->
    <h2>Проверка високосного года:</h2>
    <?php task2(2000); ?>
    
    <h2>Вывод ФИО:</h2>
    <?php task3(5);?>
    
    <h2>Работа с массивом:</h2>
    <?php task4(); ?>
    
    <h2>Работа со строками:</h2>
    <?php task5(); ?>
    
    <h2>Результат вычисления функции:</h2>
    <?php echo task6(2, 3, 0, 0); // Пример вызова функции ?>
</body>
</html>