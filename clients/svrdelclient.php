<?php
require '/home/ubuntu/workspace/db/dbconnect.php';
$iso = "SET TRANSACTION ISOLATION LEVEL SERIALIZABLE";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$iso = "START TRANSACTION";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
$client_id = $_REQUEST['client_id'];

$sql = "delete from Clients where client_id=" . $client_id;
if (!$db->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

$iso = "COMMIT";
if(!$result = $db->query($iso)){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}
?>

<script>
window.location="clientlist.php";
</script>