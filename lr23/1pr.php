<?php
    // Найти и записать свойства
    echo "<h1>file: primer.txt</h1>";
    echo "<p>В последний раз редактировался: " . date("r", filemtime("primer.txt"));
    echo "<p>В последний раз был открыт: " . date("r", fileatime("primer.txt"));
    echo "<p>Размер: " . filesize("primer.txt") . " байт";
?>
