<?php 
require '/home/ubuntu/workspace/db/dbconnect.php';
if(!$db->query('CALL delallsongs()')){
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $iso . "\n";
    echo "Errno: " . $db->errno . "</br>";
    echo "Error: " . $db->error . "</br>";
    exit;
}

?>
<script>
    window.location="songlist.php";
</script>