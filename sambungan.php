<?php
   $host = 'localhost';
   $user = 'root';
   $password = "";
   $database = 'mat';

    $sambungan = mysqli_connect($host, $user, $password, $database)
    or die('Sambungan gagal');
?>
