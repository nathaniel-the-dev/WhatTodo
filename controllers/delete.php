<?php

$id = $_GET['id'] ?? null;

if ($id) {
    $GLOBALS['db']->query('DELETE FROM todos WHERE id = ?', [$id]);
}

header('Location: /');