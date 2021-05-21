<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'crud_php_mysql') or die('Connection Failed');

    $sql = 'SELECT  s.*,sc.* FROM STUDENT as s INNER JOIN studentClass as sc ON sc.cid=s.sclass';

    $result = mysqli_query($conn, $sql) or die('Query Unsuccessful');


    if (mysqli_num_rows($result) > 0) {

    ?>
    <table cellpadding="7px">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <td><?= $row['sid'] ?></td>
                <td><?= $row['sname'] ?></td>
                <td><?= $row['saddress'] ?></td>
                <td><?= $row['cname'] ?></td>
                <td><?= $row['sphone'] ?></td>
                <td>
                    <a href='edit.php?id=<?= $row['sid']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?= $row['sid']; ?>'>Delete</a>
                </td>
            </tr>
            <?php }
                ?>
        </tbody>
    </table>
    <?php } else { ?>
    <h2>No Record Found</h2>
    <?php }

    mysqli_close($conn);
    ?>
</div>
</div>
</body>

</html>