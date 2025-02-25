<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}

require "../../config/config.php";

if(isset($_GET['kode'])) {
  $kode_petugas = $_GET['kode'];

  $query = "DELETE FROM petugas WHERE kode_petugas = '$kode_petugas'";
  if(mysqli_query($conn, $query)) {
    echo "<script>alert('Petugas deleted successfully!');</script>";
  } else {
    echo "<script>alert('Error deleting petugas.');</script>";
  }
}

header("Location: member.php");
exit;
?> 