<?php
    include("sambungan.php");
    include("urusetia_menu.php");
    if (isset($_POST["submit"])) {
        $idhakimlama = $_POST["idhakimlama"];
        $idhakim = $_POST["idhakim"];
        $password = $_POST["password"];
        $namahakim = $_POST["namahakim"];
        
        $sql = "update hakim set idhakim = '$idhakim', password='$password', namahakim = '$namahakim' where idhakim = '$idhakimlama'";
       
         $result = mysqli_query($sambungan, $sql);
         if ($result == true)
              echo "<br><center>Berjaya kemaskini</center";
         else
              echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center";
   }

   if (isset($_GET['idhakim']))
         $idhakim = $_GET['idhakim'];

   $sql = "select * from hakim where idhakim = '$idhakim'";
   $result = mysqli_query($sambungan, $sql);
   while ($hakim = mysqli_fetch_array($result)) {
       $password = $hakim['password'];
       $namahakim = $hakim['namahakim'];
   }
?>


<link rel="stylesheet" href="button.css">
<video autoplay loop class="back-video" muted plays-inline>
    <source src="imej/media2.mp4" type="video/mp4">
</video>
<h3 class="panjang">KEMASKINI HAKIM</h3>
<link rel="stylesheet" href="borang.css">
<form class="panjang" action="hakim_update.php" method="post">
    <input type="hidden" name="idhakimlama" value="<?php echo $idhakim; ?>">
    <table>
        <tr>
            <td>ID Hakim</td>
            <td><input type="text" name="idhakim" value="<?php echo $idhakim; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
        </tr>

        <tr>
            <td>Nama Hakim</td>
            <td><input type="text" name="namahakim" value="<?php echo $namahakim; ?>"></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
</form>
