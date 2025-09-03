<?php
    include ('sambungan.php');
    include ("urusetia_menu.php");
?>

<link rel="stylesheet" href="senarai.css">
<video autoplay loop class="back-video" muted plays-inline>
    <source src="imej/media2.mp4" type="video/mp4">
</video>
<table>
    <caption>SENARAI NAMA URUSETIA</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Password</th>
        <th colspan="2">Tindakan</th>
    </tr>

    <?php
        $sql = "select * from urusetia";
        $result = mysqli_query($sambungan, $sql);
        while($urusetia = mysqli_fetch_array($result)) {
         echo "<tr> <td>$urusetia[idurusetia]</td>
                    <td>$urusetia[namaurusetia]</td>
                    <td>$urusetia[password]</td>
                    <td><a href='urusetia_update.php?idurusetia=$urusetia[idurusetia]'>update</a></td>
                    <td><a href='urusetia_delete.php?idurusetia=$urusetia[idurusetia]'>delete</a></td>
                    </tr>";
        }
    ?>
</table>
