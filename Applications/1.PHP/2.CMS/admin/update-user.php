<?php include "header.php";
include 'config.php';
if($_SESSION['user_role']=='0'){

    header('location:post.php');
} 
if (isset($_POST['submit'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);
    $fname = mysqli_real_escape_string($con, $_POST['f_name']);
    $lname = mysqli_real_escape_string($con, $_POST['l_name']);
    $user = mysqli_real_escape_string($con, $_POST['username']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    $sql1 = "UPDATE  user SET  first_name='$fname',last_name='$lname',username='$user',role='$role' where user_id=$user_id";
    $resul1 = mysqli_query($con, $sql1) or die('Update Query Failed. ' . mysqli_error($con));
    header('location:users.php');
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <?php
                $user_id = $_GET['id'];
                $sql = "SELECT * FROM user WHERE user_id=$user_id";
                $result = mysqli_query($con, $sql) or die('Insert Query Failed');
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                ?>
                <!-- Form Start -->
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?= $row['user_id'] ?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="f_name" class="form-control" value="<?= $row['first_name'] ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="l_name" class="form-control" value="<?= $row['last_name'] ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <option <?php if ($row['role'] == 0) {
                                                echo 'SELECTED';
                                            } ?> value="0">normal User</option>
                            <option <?php if ($row['role'] == 1) {
                                                echo 'SELECTED';
                                            } ?> value="1">Admin</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                </form>
                <!-- /Form -->

                <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>