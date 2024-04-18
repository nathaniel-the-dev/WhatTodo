<?php

$title = 'Home';
$todos = $GLOBALS['db']->query('SELECT todos.id AS id, task, note, completed, created_at, categories.name AS category FROM todos LEFT JOIN categories ON todos.category_id = categories.id ORDER BY created_at DESC')->fetchAll();


require 'views/partials/head.php';

require 'views/index.view.php';

require 'views/partials/footer.php';
