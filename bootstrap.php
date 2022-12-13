<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once 'paths.php';

use App\Database\Database;

$db = (new Database())->getDb();
