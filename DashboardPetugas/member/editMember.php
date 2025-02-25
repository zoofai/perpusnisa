<?php
require "../../config/config.php";

if (isset($_GET['id'])) {
  $nisn = $_GET['id'];
  $member = queryReadData("SELECT * FROM member WHERE nisn = '$nisn'")[0];
}

if (isset($_POST['update_member'])) {
  $nisn = $_POST["nisn"];
  $kode_member = $_POST["kode_member"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $kelas = $_POST["kelas"];
  $jurusan = $_POST["jurusan"];
  $no_tlp = $_POST["no_tlp"];

  $query = "UPDATE member SET kode_member='$kode_member', nama='$nama', jenis_kelamin='$jenis_kelamin', kelas='$kelas', jurusan='$jurusan', no_tlp='$no_tlp' WHERE nisn='$nisn'";
  
  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Member updated successfully!'); window.location.href='member.php';</script>";
  } else {
    echo "<script>alert('Error updating member.');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Edit Member</title>
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="text-center">Edit Member</h2>
      <form action="" method="post" class="needs-validation" novalidate>
        <input type="hidden" name="nisn" value="<?= $member['nisn']; ?>">
        <div class="mb-3">
          <label for="kode_member" class="form-label">Kode Member</label>
          <input type="text" class="form-control" id="kode_member" name="kode_member" value="<?= $member['kode_member']; ?>" required>
          <div class="invalid-feedback">
            Please enter a valid Kode Member.
          </div>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= $member['nama']; ?>" required>
          <div class="invalid-feedback">
            Please enter a valid Nama.
          </div>
        </div>
        <div class="mb-3">
          <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
          <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki" <?= $member['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="Perempuan" <?= $member['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid Jenis Kelamin.
          </div>
        </div>
        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $member['kelas']; ?>" required>
          <div class="invalid-feedback">
            Please enter a valid Kelas.
          </div>
        </div>
        <div class="mb-3">
          <label for="jurusan" class="form-label">Jurusan</label>
          <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $member['jurusan']; ?>" required>
          <div class="invalid-feedback">
            Please enter a valid Jurusan.
          </div>
        </div>
        <div class="mb-3">
          <label for="no_tlp" class="form-label">No Telepon</label>
          <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $member['no_tlp']; ?>" required>
          <div class="invalid-feedback">
            Please enter a valid No Telepon.
          </div>
        </div>
        <button type="submit" class="btn btn-primary" name="update_member">Update Member</button>
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