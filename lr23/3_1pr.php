<?php
$f = fopen("1.txt", "r");
// Читать строку их текстового файла и записать содержимое клиенту
echo fgets($f);
fclose($f);
?>;