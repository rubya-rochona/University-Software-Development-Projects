<?php

$file = fopen("info.csv","w");

fputcsv($file, $_POST);


fclose($file);

header("Location: index.php?status=success");