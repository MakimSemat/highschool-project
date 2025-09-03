<?php
   include("sambungan.php");
   include("urusetia_menu.php");

   if (isset($_POST["submit"])) {
         $idurusetialama = $_POST["idurusetialama"];
         $idurusetia = $_POST["idurusetia"];
         $namaurusetia = $_POST["namaurusetia"];
         $password = $_POST["password"];
       
         $sql = "update urusetia set idurusetia = '$idurusetia', namaurusetia = '$namaurusetia', password='$password' where idurusetia = '$idurusetialama'";
        
         $result = mysqli_query($sambungan, $sql);
         if ($result == true)
              echo "<br><center>Berjaya kemaskini</center";
         else
              echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center";
   }

   if (isset($_GET['idurusetia']))
         $idurusetia = $_GET['idurusetia'];

   $sql = "select * from urusetia where idurusetia = '$idurusetia'";
   $result = mysqli_query($sambungan, $sql);
   while ($urusetia = mysqli_fetch_array($result)) {
       $password = $urusetia['password'];
       $namaurusetia = $urusetia['namaurusetia'];
   }
?>


<link rel="stylesheet" href="button.css">
<video autoplay loop class="back-video" muted plays-inline>
    <source src="imej/media2.mp4" type="video/mp4">
</video>
<h3 class="panjang">KEMASKINI URUSETIA</h3>
<link rel="stylesheet" href="borang.css">
<form class="panjang" action="urusetia_update.php" method="post">
    <input type="hidden" name="idurusetialama" value="<?php echo $idurusetia; ?>">
    <table>
        <tr>
            <td>ID urusetia</td>
            <td><input type="text" name="idurusetia" value="<?php echo $idurusetia; ?>"></td>
        </tr>
        <tr>
            <td>Nama urusetia</td>
            <td><input type="text" name="namaurusetia" value="<?php echo $namaurusetia; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
        </tr>
    </table>
    <button class="update" type="submit" name="submit">Update</button>
</form>
