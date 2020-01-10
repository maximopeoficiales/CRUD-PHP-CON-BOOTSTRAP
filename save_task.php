<?php
include("db.php");
if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "INSERT INTO task (title,description) VALUES ('$title','$description')";

    /* ejecuto el query */
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    }
    /* redirigir a  index.php */

    $_SESSION['message'] = 'Task Saved Succedfully';
    $_SESSION['message_type'] = 'warning';

    header("Location: index.php");
}else{
    echo "no se envio nada por post";
}
