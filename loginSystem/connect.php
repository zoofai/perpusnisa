<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "perpusnisa";
$connect = mysqli_connect($host, $username, $password, $database);

function signUp($data) {
    global $connect;

    $kode_member = htmlspecialchars($data["kode_member"]);
    $nama = strtolower(stripslashes($data["nama"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $confirmPw = mysqli_real_escape_string($connect, $data["confirmPw"]);

    // Cek konfirmasi password
    if ($password !== $confirmPw) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // Cek apakah data member sudah terdaftar
    $cekData = mysqli_query($connect, "SELECT * FROM member WHERE kode_member = '$kode_member'");
    if (mysqli_num_rows($cekData) > 0) {
        echo "<script>
                alert('Data member sudah terdaftar!');
              </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO member (kode_member, nama, password) 
              VALUES ('$kode_member', '$nama', '$password')";

    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}
?>
