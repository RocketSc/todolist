<?php require ROOT . 'app/views/partial/head.php'; ?>
<?php require ROOT . 'app/views/partial/nav.php'; ?>

    <h1>Task Page</h1>

    <form action="/tasks/update" method="POST">

        <?php require ROOT . 'app/views/partial/tasks-table.php'?>


    </form>

  <p>Good job! You've completed <strong><?= $completedTaskCount; ?></strong> Tasks</p>

<?php require ROOT . 'app/views/partial/footer.php'; ?>