<?php
include("db.php");

if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id_task= $id";
    $result = mysqli_query($conn, $query);
    /* si el hay almenos una fila en el resultado */
    if (mysqli_num_rows($result) == 1) {
        /* agrupa los datos en un array */
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

/* cuando envie por post con el boton */
if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $query = "UPDATE task SET title = '$title',description ='$description' WHERE id_task = $id";

    mysqli_query($conn, $query);
    $_SESSION['message'] = "Task Updated Succesfully";
    $_SESSION['message_type'] = "warning";

    header("Location: index.php");
}
?>


<?php
include("includes/header.php");
?>


<div class="container p-4 text-center">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <form action="edit.php?id=<?php echo $_GET['id'];  ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="title" value="<?php echo $title;   ?>" class="form-control" placeholder="Update Title">
                </div>
                <div class="form-group">
                    <textarea name="description" rows="2" class="form-control">
                        <?php echo $description ?>
                    </textarea>
                </div>
                <button class="btn btn-success" name="update">
                    Update
                </button>
            </form>
        </div>
    </div>

</div>

<?php
include("includes/footer.php");
?>