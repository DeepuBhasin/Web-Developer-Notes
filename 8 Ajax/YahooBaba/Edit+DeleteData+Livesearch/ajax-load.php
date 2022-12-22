<?php

$con = @mysqli_connect('localhost', 'root', '', 'phpajax') or die('Database Not Connected. Error : ' . mysqli_connect_error());



try {

    $sql = "SELECT * FROM usertable ORDER BY firstName ASC";

    $result = @mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {


            $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    <thead> 
                    <tbody>';

            while ($row = mysqli_fetch_assoc($result)) {

                $output .= "<tr><td>{$row['id']}</td><td>{$row['firstName']}</td><td>{$row['lastName']}</td><td><button class='edit-btn' data-eid='{$row['id']}'>Edit</button></td><td><button class='delete-btn' data-id='{$row['id']}'>Delete</button></td></tr>";
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo json_encode("No Record Found");
        }
    } else {
        throw new Exception(mysqli_error($con));
    }
} catch (Exception $e) {
    echo "Error : " . $e->getMessage();
}