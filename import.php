<?php 
include('sambungan.php'); 
include("urusetia_menu.php");

if (isset($_POST["submit"])) {
	$namajadual = $_POST['namatable'];
	$namafail = $_FILES['namafail']['name'];

	//ambil data dari mana pun boleh
	$sementara = $_FILES['namafail']['tmp_name'];
	move_uploaded_file($sementara, $namafail);

	$fail = fopen($namafail, "r");
	while (!feof($fail)) {

		$medan = explode(",", fgets($fail));

		$berjaya = false;
		
		if (strtolower($namajadual) === "hakim") {
			$idhakim = $medan[0];
			$namahakim = $medan[1]; 
			$password = trim($medan[2]);
			$sql = "insert into hakim values('$idhakim', '$namahakim','$password')";
			if (mysqli_query($sambungan, $sql))
				$berjaya = true;
			else 
				echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
		}

		if (strtolower($namajadual) === "urusetia") {
			$idurusetia = $medan[0];
			$password = trim($medan[1]);
			$namaurusetia = $medan[2]; 
			$sql = "insert into urusetia values('$idurusetia', '$password','$namaurusetia')";
			if (mysqli_query($sambungan, $sql))
				$berjaya = true;
			else 
				echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
		}

		if (strtolower($namajadual) === "peserta") {
			$nokp = $medan[0];
			$password = $medan[1];
			$namapeserta = $medan[2]; 
			$telefon = $medan[3];
			$idhakim = $medan[4];
			$idurusetia = $medan[5];
			$sql = "insert into peserta values('$nokp', '$password', '$namapeserta', '$telefon','$idhakim', '$idurusetia')";
			if (mysqli_query($sambungan, $sql))
				$berjaya = true; 
			else
				echo "<br><center>Ralat : $sql<br>".mysqli_error($sambungan)."</center>";
		}

	}

	if ($berjaya == true) 
		echo "<script>alert('Rekod berjaya di import');</script>";
	else
		echo "<script>alert('Rekod tidak berjaya di import');</script>";
	mysqli_close($sambungan);
}

?>

<html>
<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<video autoplay loop class="back-video" muted plays-inline>
    <source src="imej/media2.mp4" type="video/mp4">
</video>

<body>
    <h3 class="panjang">IMPORT DATA</h3>
    <form class="panjang" action="import.php" method="post" enctype="multipart/form-data" class="import">
        <table>
            <tr>
                <td>Jadual</td>
                <td>
                    <select name="namatable">
						<option value="hakim">hakim</option>
						<option value="urusetia">urusetia</option>
                        <option value="peserta">peserta</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama fail</td>
                <td><input type="file" name="namafail" accept=".txt"></td>
            </tr>
        </table>
        <button class="import" type="submit" name="submit">Import</button>
    </form>
</body>

</html>
