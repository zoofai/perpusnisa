<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

// Fetch member data
$member = queryReadData("SELECT * FROM member");

// Fetch petugas data
$petugasList = queryReadData("SELECT * FROM petugas");

if(isset($_POST["search"]) ) {
  $member = searchMember($_POST["keyword"]);
}

// Handle form submission for adding a new member
if(isset($_POST["add_member"])) {
  $nisn = $_POST["nisn"];
  $kode_member = $_POST["kode_member"];
  $nama = $_POST["nama"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $kelas = $_POST["kelas"];
  $jurusan = $_POST["jurusan"];
  $no_tlp = $_POST["no_tlp"];
  $tgl_pendaftaran = date('Y-m-d');

  $query = "INSERT INTO member (nisn, kode_member, nama, jenis_kelamin, kelas, jurusan, no_tlp, tgl_pendaftaran) 
            VALUES ('$nisn', '$kode_member', '$nama', '$jenis_kelamin', '$kelas', '$jurusan', '$no_tlp', '$tgl_pendaftaran')";
  
  if(mysqli_query($conn, $query)) {
    echo "<script>alert('Member added successfully!');</script>";
    $member = queryReadData("SELECT * FROM member"); // Refresh the member list
  } else {
    echo "<script>alert('Error adding member.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Member terdaftar</title>
  </head>
  <body>
    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
          <img src="../../assets/eperpus.png" alt="logo" width="120px">
        </a>
        
        <a class="btn btn-tertiary" href="../dashboardPetugas.php">Dashboard</a>
      </div>
    </nav>
    
    <div class="p-4 mt-5">
      <!--search engine --->
      <form action="" method="post" class="mt-5">
        <div class="input-group d-flex justify-content-end mb-3">
          <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="cari data member...">
          <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
      </form>

      <!-- Add User and Petugas Buttons -->
      <div class="mb-4">
        <a href="addUser.php" class="btn btn-primary">Tambah Siswa</a>
      
      <h3>Daftar Siswa</h3>
      <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
        <thead class="text-center">
          <tr>
            <th class="bg-primary text-light">Nisn</th>
            <th class="bg-primary text-light">Kode</th>
            <th class="bg-primary text-light">Nama</th>
            <th class="bg-primary text-light">Jenis Kelamin</th>
            <th class="bg-primary text-light">Kelas</th>
            <th class="bg-primary text-light">Jurusan</th>
            <th class="bg-primary text-light">No Telepon</th>
            <th class="bg-primary text-light">Pendaftaran</th>
            <th class="bg-primary text-light">Edit</th>
            <th class="bg-primary text-light">Delete</th>
          </tr>
        </thead>
      <?php foreach($member as $item) : ?>
      <tr>
      <thead class="text-center">
        <td><?=$item["nisn"];?></td>
        <td><?=$item["kode_member"];?></td>
        <td><?=$item["nama"];?></td>
        <td><?=$item["jenis_kelamin"];?></td>
        <td><?=$item["kelas"];?></td>
        <td><?=$item["jurusan"];?></td>
        <td><?=$item["no_tlp"];?></td>
        <td><?=$item["tgl_pendaftaran"];?></td>
        <td>
          <div class="action">
            <a href="editMember.php?id=<?= $item["nisn"]; ?>" class="btn btn-warning"><i class="fa-solid fa-edit"></i></a>
          </div>
        </td>
        <td>
          <div class="action">
            <a href="deleteMember.php?id=<?= $item["nisn"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data member ?');"><i class="fa-solid fa-trash"></i></a>
          </div>
        </td>
       </tr>
      <?php endforeach;?>
    </table>
    </div>
          </tbody>
        </table>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body> 
</html>