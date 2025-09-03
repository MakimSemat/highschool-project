<?php
   include('sambungan.php');

// VALIDATION \\
    if (isset($_POST['s'])){
        $pass = $_POST['password'];
        $nkp = $_POST["nokp"];
        $notp = $_POST["no_tel"];
        
        if(strlen($nkp)<12){ 
            echo "<script>alert('Sila masukkan no kad pengenalan dengan lengkap')</script>" ; 
            echo "<script>window.location='signup.php'</script>" ; 
            return false; 
        }//Kalau no kad pengenalan kurang dari 12
        if(strlen($notp)>12){
            echo "<script>alert('Sila masukkan no telefon dengan lengkap')</script>";
            echo "<script>window.location='signup.php'</script>";
            return false;
        }//Kalau no telefon lebih dari 12
        if(strlen($notp)<9){
            echo "<script>alert('Sila masukkan no telefon dengan lengkap')</script>";
            echo "<script>window.location='signup.php'</script>";
            return false;
        }//Kalau no telefon kurang dari 9
        if(strlen($pass)<8){
            echo "<script>alert('Password yang anda masukkan kurang daripada 8 aksara')</script>";
            echo "<script>window.location='signup.php'</script>";
            return false;
        }//Kalau password kurang dari 8
        if(strlen($pass)>8){
            echo "<script>alert('Password yang anda masukkan lebih daripada 8 aksara')</script>";
            echo "<script>window.location='signup.php'</script>";
            return false;
        }//Kalau password lebih dari 8
    }

//INSERT DATA TO MYSQL\\
    if (isset($_POST['nokp'])) {
        $nokp = $_POST["nokp"];
        $password = $_POST["password"];
        $namapeserta = $_POST["namapeserta"];
        $telefon = $_POST["no_tel"];
        $idhakim = $_POST["idhakim"];
        $idurusetia = $_POST["idurusetia"];
        $sql = "insert into peserta values('$nokp', '$password', '$namapeserta', '$telefon', '$idhakim', '$idurusetia')";
        $result = mysqli_query($sambungan, $sql);
        if ($result)
            echo "<script>alert('Berjaya signup')</script>";
        else
            echo "<script>alert('Tidak berjaya signup')</script>";
        echo "<script>window.location='login.php'</script>";
    }
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">

<body>
    <video autoplay loop class="back-video" muted plays-inline>
        <source src="imej/media2.mp4" type="video/mp4">
    </video>
    <center>
        <img src='imej/tajuk1.png'><br>
        <img src='imej/tajuk2.png'>
    </center>

    <h3 class="panjang">SIGN UP</h3>
    <form name="form1" class="panjang" action="signup.php" method="post">
        <table>
            <tr>
                <td>No KP</td>
                <td><input type="text" name="nokp" placeholder="050505109027"></td>
            </tr>
            <tr>
                <td>Nama Peserta</td>
                <td><input type="text" name="namapeserta" placeholder="Roni Bin John "></td>
            </tr>
            <tr>
                <td>No Telefon</td>
                <td><input type="text" name="no_tel" placeholder="01123456789"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td><input type="text" name="password" placeholder="max 8 character"></td>
            </tr>
            <tr>
                <td>Nama Hakim</td>
                <td>
                    <select name="idhakim">
                        <?php
                 $sql = "select * from hakim";
                 $data = mysqli_query($sambungan, $sql);
                 while ($hakim = mysqli_fetch_array($data)) {
                     echo "<option value='$hakim[idhakim]'>$hakim[namahakim]</option>";
                 }
              ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="warna">Nama Urusetia</td>
                <td>
                    <select name="idurusetia">
                        <?php
                  $sql = "select * from urusetia";
                  $data = mysqli_query($sambungan, $sql);
                  while ($urusetia = mysqli_fetch_array($data)) {
                      echo "<option value='$urusetia[idurusetia]'>$urusetia[namaurusetia]</option>";
                  }
               ?>
                    </select>
                </td>
            </tr>
        </table>
        <button name="s" class="tambah" type="submit">Daftar</button>
        <button class="padam" type="button" onclick="window.location='login.php'">Batal</button>
    </form>
</body>
