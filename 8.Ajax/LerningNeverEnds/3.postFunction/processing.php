<?php
print_r($_POST);
if(isset($_POST['uname']) && isset($_POST['sname'])){
    $uname = $_POST['uname'];
    $sname = $_POST['sname'];
    echo "Your Username is :  $uname and Your surname is : $uname";
}

?>