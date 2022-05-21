<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "onlinecoffee";

//MEMBUAT KONEKSI DB
$conn = mysqli_connect($host, $user, $password, $db);


// FUNCTION REGISTRASI
function registrasi($data)
{
    global $conn;
    $nama = strtolower(stripslashes($data["nama"]));
    $email = mysqli_real_escape_string($conn, $data["email"]);
    $place = ($data["place"]);

    //  INPUT USER KE DATABASE
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$email', '$place')");

    return mysqli_affected_rows($conn);
}
