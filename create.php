<?php
require("connection.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $command = "INSERT INTO profile (nama, alamat) VALUES ('$nama', '$alamat')";
    $execute = mysqli_query($connect, $command);
    $check = mysqli_affected_rows($connect);

    if($check > 0) {
        $response["code"] = 1;
        $response["message"] = "Successed to save data";
    } else {
        $response["code"] = 0;
        $response["message"] = "Failed to save data";
    }
} else {
    $response["code"] = 0;
    $response["message"] = "There is no data post";

}
echo json_encode($response);
mysqli_close($connect);