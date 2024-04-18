<?php

// Page title
$title = 'Edit Task';

// Categories
$categories = $GLOBALS['db']->query('SELECT * FROM categories')->fetchAll();

// Get todo for update
$id = $_GET['id'];
$todo;

if ($id) {
    $todo = $GLOBALS['db']->query('SELECT task, note, category_id, completed FROM todos WHERE id = ?', [$id])->fetch();
} else {
    header('Location: /');
    die();
}

// Validation
$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate input
    if (!isset($_POST['task']) || empty($_POST['task'])) {
        $errors['task'] = 'Please enter a task';
    } elseif (strlen($_POST['task']) > 255) {
        $errors['task'] = 'Cannot be more than 255 characters';
    }

    if (isset($_POST['note']) && strlen($_POST['note']) > 1000) {
        $errors['note'] = 'Note must be less than 1000 characters';
    }

    // Insert data
    if (empty($errors)) {
        $GLOBALS['db']->query(
            'UPDATE todos SET task=:task, note=:note, category_id=:category_id, completed=:completed WHERE id=:id',
            [
                'id' => $id,
                'task' => htmlspecialchars($_POST['task'] ?? $todo['task']),
                'note' => htmlspecialchars($_POST['note'] ?? $todo['note'] ?? NULL),
                'category_id' => $_POST['category_id'] ?? $todo['category_id'] ?? NULL,
                'completed' => (isset($_POST['completed']) && $_POST['completed'] == 'on') ? 1 : 0
            ]
        );

        // Redirect to home page
        header('Location: /');
        die();
    }
}

require 'views/partials/head.php';

require 'views/create.view.php';

require 'views/partials/footer.php';
