<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$fName = $_REQUEST['fName'];
$lName = $_REQUEST['lName'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$relation = $_REQUEST['relation'];

$sql = "INSERT INTO Clients(fName, lName, phone, email, relation)
 values('$fName','$lName','$phone','$email','$relation')";
if (!$db->query($sql)) {
    if( $db->errno == 1062 ){
        echo "Client with email " . $email . " already exists in song list </br>";
        echo "<a href='clientlist.php'>Return to Client List</a>";
        exit;
    }
    else{
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
    }
}

header('Location: https://band-manager-okidailthief.c9users.io/events/cltaddevent.php?email='.$email);
        
?>

