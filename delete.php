<?php
require("connection.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $command = "DELETE FROM profile WHERE id = '$id'";
    $execute = mysqli_query($connect, $command);
    $check = mysqli_affected_rows($connect);

    if($check > 0) {
        $response["code"] = 1;
        $response["message"] = "Successed to delete data";
    } else {
        $response["code"] = 0;
        $response["message"] = "Failed to delete data";
    }
} else {
    $response["code"] = 0;
    $response["message"] = "There is no data post";

}
echo json_encode($response);
mysqli_close($connect);