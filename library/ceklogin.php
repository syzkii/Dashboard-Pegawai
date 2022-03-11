<?php

    session_start ();
    include "../library/config.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data  = mysqli_fetch_array($query);
    $jml   = mysqli_num_rows($query);

    if ($jml > 0) {
        $session['username'] = $data['username'];
        $session['password'] = $data['password'];

        header('Location: ../Dashboard/index.php');
    }
    else {
        echo "<p align='center'>Login anda gagal, mohon periksa kembali!</p>";
        echo "<meta http-equiv='refresh' content='2; url=login.php'>";
    }

?>