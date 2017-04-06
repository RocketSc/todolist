<?php require ROOT . 'app/views/partial/head.php'; ?>
<?php require ROOT . 'app/views/partial/nav.php'; ?>

<h1>Task Page</h1>

<form action="/tasks/update" method="POST">

<?php require ROOT . 'app/views/partial/tasks-table.php'?>

</form>

<h2>Submit your task</h2>

<form action="/tasks" method="POST">
    <input type="text" name="description">
    <input type="submit" value="Submit">
  </form>

<?php require ROOT . 'app/views/partial/footer.php'; ?>