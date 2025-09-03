<?php
    include("sambungan.php");
    include("urusetia_menu.php");

    if (isset($_POST["submit"])) {
        $idurusetia = $_POST["idurusetia"];
        $password = $_POST["password"];
        $namaurusetia = $_POST["namaurusetia"];
        
        $sql = "insert into urusetia values('$idurusetia', '$password', '$namaurusetia')";
        $result = mysqli_query($sambungan, $sql);
        if ($result == true)
            echo "<br><center>Berjaya tambah</center>";
else
            echo "<br><center>Ralat: $sql<br>".mysqli_error($sambungan)."</center>";
    }
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<video autoplay loop class="back-video" muted plays-inline>
        <source src="imej/media2.mp4" type="video/mp4">
    </video>
<h3 class="panjang"> TAMBAH URUSETIA </h3>
<form class="panjang" action="urusetia_insert.php" method="post">
    <table>

        <tr>
            <td>ID urusetia</td>
            <td><input type="text" name="idurusetia"></td>
        </tr>

        <tr>
            <td>Nama Urusetia</td>
            <td><input type="text" name="namaurusetia"></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type="password" name="password" placeholder="max: 8 char"></td>
        </tr>

    </table>
    <button class="tambah" type="submit" name="submit">Tambah</button>
</form>
