<table class="task-table">
    <?php foreach ($tasks as $task) : ?>
        <tr id="js-task-<?= $task->id; ?>">

            <td>
                <input type="checkbox"
                       id="task-<?= $task->id; ?>"
                       class="js-task-checkbox"
                       data-task="<?= $task->id; ?>"
                    <?= ( $task->isComplete() ) ? 'checked' : '';?>
                       name="task-<?= $task->id; ?>-completed"
                >
                <input type="hidden"
                       name="task-<?= $task->id; ?>"
                >
            </td>

            <td>
          <span <?= ( $task->isComplete() ) ? 'class="completed"' : '';?>>
            <label for="task-<?= $task->id; ?>">
              <?= $task->description;?>
            </label>
          </span>

            </td>
        </tr>
    <?php endforeach; ?>
</table>
