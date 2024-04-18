<?php

// Page title
$title = 'Add Task';

// Categories
$categories = $GLOBALS['db']->query('SELECT * FROM categories')->fetchAll();

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
            'INSERT INTO todos (task, note, category_id) VALUES (:task, :note, :category_id)',
            [
                'task' => htmlspecialchars($_POST['task']),
                'note' => htmlspecialchars($_POST['note']) ?? NULL,
                'category_id' => $_POST['category_id'] ?? NULL
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
