<?php

require __DIR__ . '/vendor/autoload.php';

use Rahat\FiciFirebaseServer;



if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}
