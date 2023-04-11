<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<h2>Contoh Form Input Tanggal Otomatis PHP</h2>
<?php
$timestamp = 1234567890;
$stringDate = date('Y-m-d', $timestamp);

?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">  
  Nama: <input type="text" name="nama">
  <br><br>
        <input type="hidden" name="tanggal" value="<?php echo $stringDate; ?>">
  <input type="submit" name="submit" value="Submit">  
</form>
    <?php
    $name = "";
    $tanggal = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["nama"];
        $tanggal = $_POST["tanggal"];

        echo "<h2>Hasil:</h2>";
  echo "Nama : ".$name;
        echo "<br>";
        echo "Tanggal Sekarang : ".$tanggal;
    }
    ?>

</body>
</html>