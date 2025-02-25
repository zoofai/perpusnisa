<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

if(isset($_POST["add_petugas"])) {
  $kode_petugas = $_POST["kode_petugas"];
  $nama_petugas = $_POST["nama_petugas"];
  $no_tlp = $_POST["no_tlp"];
  $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

  $query = "INSERT INTO petugas (kode_petugas, nama_petugas, no_tlp, password) 
            VALUES ('$kode_petugas', '$nama_petugas', '$no_tlp', '$password')";
  
  if(mysqli_query($conn, $query)) {
    echo "<script>alert('Petugas added successfully!');</script>";
  } else {
    echo "<script>alert('Error adding petugas.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Tambah Petugas</title>
    <style>
      /* Tambahkan gaya khusus di sini jika diperlukan */
    </style>
  </head>
  <body>
  <div class="container">
    <div class="card p-2 mt-5">
      <div class="position-absolute top-0 start-50 translate-middle">
        <img src="../../assets/memberLogo.png" alt="adminLogo" width="85px">
      </div>
    <div class="container mt-5">
      <h2 class="text-center">Tambah Petugas</h2>
      <form action="" method="post" class="needs-validation" novalidate>
        <div class="row mb-3">
          <div class="col">
            <label for="kode_petugas" class="form-label">Kode Petugas</label>
            <input type="text" class="form-control" id="kode_petugas" name="kode_petugas" required>
            <div class="invalid-feedback">
              Please enter a valid Kode Petugas.
            </div>
          </div>
          <div class="col">
            <label for="nama_petugas" class="form-label">Nama Petugas</label>
            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required>
            <div class="invalid-feedback">
              Please enter a valid Nama Petugas.
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="no_tlp" class="form-label">No Telepon</label>
          <input type="text" class="form-control" id="no_tlp" name="no_tlp" required>
          <div class="invalid-feedback">
            Please enter a valid No Telepon.
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
          <div class="invalid-feedback">
            Please enter a valid Password.
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="add_petugas">Add Petugas</button>
        <a href="member.php" class="btn btn-secondary">Back</a>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
      })()
    </script>
  </body>
</html> 