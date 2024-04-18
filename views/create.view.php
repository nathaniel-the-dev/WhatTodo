<div class="container max-w-lg mx-auto">

    <?php require 'partials/header.php'; ?>

    <div class="bg-white rounded py-6 px-8 w-full">
        <h2 class="text-2xl font-semibold mb-6"><?= !empty($todo) ? 'Update' : 'Add' ?> a Task</h2>

        <form method="post">
            <div class="grid gap-0.5 mb-4">
                <label for="task" class="text-gray-600">Task<span class="text-red-500">*</span></label>
                <input class="rounded-md border-gray-300" type="text" name="task" id="task" value="<?= $todo['task'] ?? '' ?>" required maxlength="255">

                <p class="text-red-500 text-sm"><?= $errors['task'] ?? '' ?></p>
            </div>

            <div class="grid gap-0.5 mb-4">
                <label for="note" class="text-gray-600">Note</label>
                <textarea class="rounded-md border-gray-300" name="note" id="note" cols="30" rows="5" style="resize: none;" maxlength="1000"><?= $todo['note'] ?? NULL ?></textarea>
            </div>

            <div class="grid gap-0.5 mb-4">
                <label for="category" class="text-gray-600">Category</label>
                <select class="rounded-md border-gray-300" name="category_id" id="category">
                    <option value="" selected disabled hidden>-- Select --</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>" <?= (!empty($todo) && $todo['category_id'] == $category['id']) ? 'selected' : '' ?>>
                            <?= $category['name'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <?php if (!empty($todo)) : ?>
                <div class="mt-6">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="completed" <?= ($todo['completed']) ? 'checked' : '' ?> class="sr-only peer">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Complete</span>
                    </label>
                </div>
            <?php endif ?>

            <div class="mt-6 flex justify-end gap-3">
                <button class="btn bg-blue-500 text-white hover:bg-blue-600" type="submit"><i class="fas fa-save"></i>
                    Save</button>
                <a class="btn" href="/">Cancel</button>
            </div>
        </form>
    </div>
</div>