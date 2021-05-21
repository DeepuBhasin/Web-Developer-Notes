<?php

$con = @mysqli_connect('localhost', 'root', '', 'phpajax') or die('Database Not Connected. Error : ' . mysqli_connect_error());



try {

	 $id=$_POST['id'];

    $sql = "SELECT * FROM usertable where id=$id";

    $result = @mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {



            while ($row = mysqli_fetch_assoc($result)) {

            	$output=	"<tr>
                    <td>First Name</td><td><input type='text' id='edit-fname' value='{$row['firstName']}'>
                    <input type='text' hidden='hidden' id='edit-id' value='{$row['id']}'>
                    </td>
                </tr>
                <tr>    
                    <td>Last Name</td><td><input type='text' id='edit-lname' value='{$row['lastName']}'></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type='submit' id='edit-submit' value='save'></td>
                </tr>";
				}
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