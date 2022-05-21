<?php

// CALLING FUNCTIONS
require 'koneksi.php';


//CALLING REGISTER FUNCTION
if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('User baru berhasil ditambahkan!');
        </script>";
        header('Location: index.php');
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- LINK BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />
    <title>Naramel Coffee</title>

</head>

<body>
    <div class="judul">
        <h1 class="text-light">Welcome to Naramel Coffee!</h1>
    </div>
    <div class="judul2">
        <p class="text-light">Please register yourself!</p>
    </div>
    <form action="" method="post">
        <ul>
            <ol>
                <label for="nama">Name</label>
                <input type="text" name="nama" id="nama">
            </ol>
            <ol>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </ol>
            <ol>
                <label for="place">Our Outlet</label>
                <p><input type="radio" name="place" value="bekasi">Bekasi</p>
                <p><input type="radio" name="place" value="jakarta">Jakarta</p>
                <p><input type="radio" name="place" value="Yogyakarta">Yogyakarta</p>
            </ol>
            <ol>
                <button type="submit" name="register">Register!</button>
            </ol>
        </ul>
    </form>
</body>

</html>