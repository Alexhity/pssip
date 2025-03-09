<?php
// Открыть папку
$folder = opendir("D:/Apps/OSPanel/home/pssip.local/lr23");
// Цикл по всем файлам папки
while (($entry = readdir($folder)) != "") {
echo $entry . "<br />";
}
// Закрыть папку
$folder = closedir($folder);
?>