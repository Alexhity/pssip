<?php
// Функция для получения дня недели на русском языке
function getWeekdayInRussian($date) {
    // Получаем день недели на английском
    $weekday = date('D', strtotime($date));
    
    // Сравниваем с английскими аббревиатурами и присваиваем соответствующий день на русском
    if ($weekday == 'Mon') {
        return "понедельник";
    } elseif ($weekday == 'Tue') {
        return "вторник";
    } elseif ($weekday == 'Wed') {
        return "среда";
    } elseif ($weekday == 'Thu') {
        return "четверг";
    } elseif ($weekday == 'Fri') {
        return "пятница";
    } elseif ($weekday == 'Sat') {
        return "суббота";
    } elseif ($weekday == 'Sun') {
        return "воскресенье";
    }
}

// Получаем текущую дату и время
$currentDate = date('j. m. Y'); // Краткий формат даты
$currentTime = date('H:i:s'); // Время
$currentWeekday = getWeekdayInRussian(date('Y-m-d')); // День недели на русском

// Выводим текущую дату, время и день недели
echo $currentDate . "\n"; // Первая строка: дата
echo $currentTime . "\n"; // Вторая строка: время
echo $currentWeekday . "\n"; // Третья строка: день недели

// HTML форма с кнопкой
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Текущая дата</title>
</head>
<body>
    <h1>Текущая дата: <?php echo $currentDate; ?></h1>
    <form method="post">
        <button type="submit" name="show_weekday">Показать день недели</button>
    </form>

    <?php
    // Проверяем, была ли нажата кнопка
    if (isset($_POST['show_weekday'])) {
        echo "Сегодня " . $currentWeekday; // Выводим день недели на русском
    }
    ?>
</body>
</html>
