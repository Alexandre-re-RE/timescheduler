<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Database\Database;

$db = (new Database('cakephp', 'cakephp', 'cakephp'))->getDb();
