<?php

define('ROOT', dirname(__DIR__));

define('APP', ROOT . DIRECTORY_SEPARATOR . 'src');

define('APP_DIR', str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace(DIRECTORY_SEPARATOR, '/', ROOT)) . '/');

define('TEMPLATES', APP . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR);
