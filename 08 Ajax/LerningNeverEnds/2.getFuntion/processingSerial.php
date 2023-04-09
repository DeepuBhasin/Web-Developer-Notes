<?php
print_r($_GET);
echo "\n";
if(isset($_GET['uname']) && isset($_GET['sname'])){
    $uname = $_GET['uname'];
    $sname = $_GET['sname'];
    $mobile = $_GET['mobile'];
    echo "Your Username is :  $uname and Your surname is : $uname and Your Mobile: $mobile";
}

?>