<?php
    include ('sambungan.php');
    include("urusetia_menu.php");
?>


<link rel="stylesheet" href="senarai.css">
<video autoplay loop class="back-video" muted plays-inline>
    <source src="imej/media2.mp4" type="video/mp4">
</video>
<table>
    <caption>SENARAI HAKIM</caption>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Password</th>
        <th colspan="2">Tindakan</th>
    </tr>

    <?php
        $sql = "select * from hakim";
        $result = mysqli_query($sambungan, $sql);
        while($hakim = mysqli_fetch_array($result)) {
         echo "<tr> <td>$hakim[idhakim]</td>
                    <td>$hakim[namahakim]</td>
                    <td>$hakim[password]</td>
                
                    <td><a href='hakim_update.php?idhakim=$hakim[idhakim]'>update</a></td>
                    <td><a href='hakim_delete.php?idhakim=$hakim[idhakim]'>delete</a></td>
                    </tr>";
        }
    ?>
</table>
