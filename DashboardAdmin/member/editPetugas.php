<?php
require "../../config/config.php";

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_GET['kode'])) {
  $kode_petugas = $_GET['kode'];
  $petugas = queryReadData("SELECT * FROM petugas WHERE kode_petugas = '$kode_petugas'")[0];
}

if (isset($_POST['update_petugas'])) {
  $kode_petugas = $_POST["kode_petugas"];
  $nama_petugas = $_POST["nama_petugas"];
  $no_tlp = $_POST["no_tlp"];

  $query = "UPDATE petugas SET nama_petugas='$nama_petugas', no_tlp='$no_tlp' WHERE kode_petugas='$kode_petugas'";
  
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Petugas updated successfully!'); window.location.href='member.php';</script>";
  } else {
    echo "<script>alert('Error updating petugas.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Petugas</title>
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="text-center">Edit Petugas</h2>
      <form action="" method="post">
        <input type="hidden" name="kode_petugas" value="<?= $petugas['kode_petugas']; ?>">
        <div class="mb-3">
          <label for="nama_petugas" class="form-label">Nama Petugas</label>
          <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $petugas['nama_petugas']; ?>" required>
        </div>
        <div class="mb-3">
          <label for="no_tlp" class="form-label">No Telepon</label>
          <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $petugas['no_tlp']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="update_petugas">Update Petugas</button>
        <a href="member.php" class="btn btn-secondary">Back</a>
      </form>
    </div>
  </body>
</html> 