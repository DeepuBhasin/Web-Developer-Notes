<?php
print_r($_GET);
if(isset($_GET['uname']) && isset($_GET['sname'])){
    $uname = $_GET['uname'];
    $sname = $_GET['sname'];
    echo "Your Username is :  $uname and Your surname is : $uname";
}

?>