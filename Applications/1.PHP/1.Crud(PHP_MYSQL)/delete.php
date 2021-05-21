<?php include 'header.php';
if (isset($_POST['deletebtn'])) {
    $stu_id = $_POST['sid'];

    $conn = mysqli_connect('localhost', 'root', '', 'crud_php_mysql') or die('Connection Failed' . mysqli_connect_error());

    $sql = "DELETE FROM student where sid=$stu_id";

    $result = mysqli_query($conn, $sql) or die('Query Unsuccessful. ' . mysqli_error($conn));

    header('location:index.php');

    mysqli_close($conn);
}


?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>

</html>