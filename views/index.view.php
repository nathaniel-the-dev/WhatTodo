<div class="container max-w-lg mx-auto">

    <?php require 'partials/header.php'; ?>

    <div class="bg-white rounded py-6 px-8 w-full">
        <h2 class="text-2xl font-semibold">🎯 Today's Focus</h2>

        <hr class="mb-8 mt-4">

        <?php if (!empty($todos)) : ?>
            <ul class="grid gap-4 overflow-y-auto max-h-60">
                <?php foreach ($todos as $todo) : ?>
                    <li class="border border-gray-300 p-4 rounded shadow group">
                        <div class="flex items-center gap-4">
                            <div class="grow">
                                <small class="text-blue-500 -mt-2 block"><?= $todo['category'] ?? '' ?></small>
                                <p class="font-semibold dark:text-gray-300 <?= ($todo['completed']) ? 'line-through text-gray-500' : 'text-gray-900' ?>">
                                    <?= $todo['task'] ?></p>
                            </div>

                            <div class="actions ml-auto flex items-center gap-2 text-gray-600">
                                <a href="/update?id=<?= $todo['id'] ?>" class="btn hover:text-blue-500" title="Edit"><i class="fas fa-pencil"></i></a>
                                <a href="/delete?id=<?= $todo['id'] ?>" class="btn hover:text-red-500" title="Delete"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                        <?php if (isset($todo['note']) && !empty($todo['note'])) : ?>
                            <hr class="my-2" />
                            <p class="text-gray-600 text-sm max-lines"><?= $todo['note'] ?></p>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
            </ul>
        <?php else : ?>
            <div class="h-16">
                <p class="text-gray-600">Looks like you don't have any tasks for today.</p>
            </div>
        <?php endif ?>

        <div class="mt-8">
            <a href="/create" class="btn w-full text-white text-center bg-blue-500 py-2 rounded transition hover:bg-blue-700">
                <i class="fas fa-plus"></i> Add Task
            </a>
        </div>
    </div>
</div>