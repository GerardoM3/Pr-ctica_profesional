<?php
$variavle = unserialize($_GET['var']);
$variavle2 = urldecode($variavle);
echo "El array es: ".$variavle2.".";