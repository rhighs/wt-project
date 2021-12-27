<?php

$GLOBALS["host"] = "localhost";
$GLOBALS["dbname"] = "test";
$GLOBALS["username"] = "root";
$GLOBALS["password"] = "root";

try {
    $connection = new mysqli($GLOBALS["host"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["dbname"]);
    echo "Connection done!\n";
} catch (Exception $error) {
    echo $error;
}

function execute_query($query, $db){
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

$data = execute_query("SELECT * FROM insiemi", $connection);
echo sizeof($data);
foreach ($data as $d) {
    echo $d["valore"] . "\n";
}

?>
