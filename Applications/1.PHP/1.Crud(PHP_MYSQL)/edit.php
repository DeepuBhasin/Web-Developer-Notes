<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'crud_php_mysql') or die('Connection Failed');

    $stu_id = $_GET['id'];
    $sql = "SELECT  * FROM student where sid={$stu_id}";

    $result = mysqli_query($conn, $sql) or die('Query Unsuccessful');


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {



    ?>

    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="hidden" name="sid" value="<?= $row['sid'] ?>" />
            <input type="text" name="sname" value="<?= $row['sname'] ?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?= $row['saddress'] ?>" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <option value="" disabled>Select Class</option>
                <?php
                        $sql1 = "SELECT * FROM studentClass";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                <option <?php if ($row1['cid'] == $row['sclass']) {
                                        echo 'SELECTED';
                                    } ?> value="<?= $row1['cid'] ?>"><?= $row1['cname'] ?>
                </option>
                <?php
                        }
                        ?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?= $row['sphone'] ?>" />
        </div>
        <input class="submit" type="submit" value="Update" />
    </form>

    <?php }
    } ?>
</div>
</div>
</body>

</html>