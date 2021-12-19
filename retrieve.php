<?php

require('connection.php');
$command = "SELECT * FROM profile";
$execute = mysqli_query($connect, $command);
$check = mysqli_affected_rows($connect);

if($check > 0) {
    $response["code"] = 1;
    $response["message"] = "Data is available";
    $response["data"] = array();

    while($fetchData = mysqli_fetch_object($execute)) {
        $F["id"] = $fetchData->id;
        $F["nama"] = $fetchData->nama;
        $F["alamat"] = $fetchData->alamat;

        array_push($response["data"], $F);
    }
} else {
    $response["code"] = 0;
    $response["message"] = "Data is not available";
}

echo json_encode($response);
mysqli_close($connect);