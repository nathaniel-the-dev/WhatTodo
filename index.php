<?php

// Config and utils
require './utils.php';
$config = require './config.php';

// Database
require './database.php';
$GLOBALS['db'] = new Database($config['database']);

// Router
require './router.php';
