<?php
$servername = "localhost"; // atau nama server Anda
$username = "root"; // atau username database Anda
$password = ""; // atau password database Anda
$dbname = "perpusnisa"; // ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// === FUNCTION KHUSUS ADMIN START ===

// MENAMPILKAN DATA KATEGORI BUKU
function queryReadData($dataKategori) {
  global $conn;
  $result = mysqli_query($conn, $dataKategori);
  $items = [];
  while($item = mysqli_fetch_assoc($result)) {
    $items[] = $item;
  }     
  return $items;
}

// Menambahkan data buku 
function tambahBuku($dataBuku) {
  global $conn;
  
  $cover = upload();
  $idBuku = htmlspecialchars($dataBuku["id_buku"]);
  $kategoriBuku = $dataBuku["kategori"];
  $judulBuku = htmlspecialchars($dataBuku["judul"]);
  $pengarangBuku = htmlspecialchars($dataBuku["pengarang"]);
  $penerbitBuku = htmlspecialchars($dataBuku["penerbit"]);
  $tahunTerbit = $dataBuku["tahun_terbit"];
  $jumlahHalaman = $dataBuku["jumlah_halaman"];
  $deskripsiBuku = htmlspecialchars($dataBuku["buku_deskripsi"]);
  
  if(!$cover) {
    return 0;
  } 
  
  $queryInsertDataBuku = "INSERT INTO buku VALUES('$cover', '$idBuku', '$kategoriBuku', '$judulBuku', '$pengarangBuku', '$penerbitBuku', '$tahunTerbit', $jumlahHalaman, '$deskripsiBuku')";
  
  mysqli_query($conn, $queryInsertDataBuku);
  return mysqli_affected_rows($conn);
  
}       

// Function upload gambar 
function upload() {
  $namaFile = $_FILES["cover"]["name"];
  $ukuranFile = $_FILES["cover"]["size"];
  $error = $_FILES["cover"]["error"];
  $tmpName = $_FILES["cover"]["tmp_name"];
  
  // cek apakah ada gambar yg diupload
  if($error === 4) {
    echo "<script>
    alert('Silahkan upload cover buku terlebih dahulu!')
    </script>";
    return 0;
  }
  
  // cek kesesuaian format gambar
  $jpg = "jpg";
  $jpeg = "jpeg";
  $png = "png";
  $svg = "svg";
  $bmp = "bmp";
  $psd = "psd";
  $tiff = "tiff";
  $formatGambarValid = [$jpg, $jpeg, $png, $svg, $bmp, $psd, $tiff];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  
  if(!in_array($ekstensiGambar, $formatGambarValid)) {
    echo "<script>
    alert('Format file tidak sesuai');
    </script>";
    return 0;
  }
  
  // batas ukuran file
  if($ukuranFile > 2000000) {
    echo "<script>
    alert('Ukuran file terlalu besar!');
    </script>";
    return 0;
  }
  
   //generate nama file baru, agar nama file tdk ada yg sama
  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $ekstensiGambar;
  
  move_uploaded_file($tmpName, '../../imgDB/' . $namaFileBaru);
  return $namaFileBaru;
} 

// MENAMPILKAN SESUATU SESUAI DENGAN INPUTAN USER PADA * SEARCH ENGINE *
function search($keyword) {
  // search data buku
  $querySearch = "SELECT * FROM buku 
  WHERE
  judul LIKE '%$keyword%' OR
  kategori LIKE '%$keyword%'
  ";
  return queryReadData($querySearch);
  
  // search data pengembalian || member
  $dataPengembalian = "SELECT * FROM pengembalian 
  WHERE 
  id_pengembalian '%$keyword%' OR
  id_buku LIKE '%$keyword%' OR
  judul LIKE '%$keyword%' OR
  kategori LIKE '%$keyword%' OR
  nisn LIKE '%$keyword%' OR
  nama LIKE '%$keyword%' OR
  nama_admin LIKE '%$keyword%' OR
  tgl_pengembalian LIKE '%$keyword%' OR
  keterlambatan LIKE '%$keyword%' OR
  denda LIKE '%$keyword%'";
  return queryReadData($dataPengembalian);
}

function searchMember ($keyword) {
     // search member terdaftar || admin
   $searchMember = "SELECT * FROM member WHERE 
   nisn LIKE '%$keyword%' OR 
   kode_member LIKE '%$keyword%' OR
   nama LIKE '%$keyword%' OR 
   jurusan LIKE '%$keyword%'
   ";
   return queryReadData($searchMember);
}


// DELETE DATA Buku
function delete($bukuId) {
  global $conn;
  $queryDeleteBuku = "DELETE FROM buku WHERE id_buku = '$bukuId'
  ";
  mysqli_query($conn, $queryDeleteBuku);
  
  return mysqli_affected_rows($conn);
}

// UPDATE || EDIT DATA BUKU 
function updateBuku($dataBuku) {
  global $conn;

  $gambarLama = htmlspecialchars($dataBuku["coverLama"]);
  $idBuku = htmlspecialchars($dataBuku["id_buku"]);
  $kategoriBuku = $dataBuku["kategori"];
  $judulBuku = htmlspecialchars($dataBuku["judul"]);
  $pengarangBuku = htmlspecialchars($dataBuku["pengarang"]);
  $penerbitBuku = htmlspecialchars($dataBuku["penerbit"]);
  $tahunTerbit = $dataBuku["tahun_terbit"];
  $jumlahHalaman = $dataBuku["jumlah_halaman"];
  $deskripsiBuku = htmlspecialchars($dataBuku["buku_deskripsi"]);
  
  
  // pengecekan mengganti gambar || tidak
  if($_FILES["cover"]["error"] === 4) {
    $cover = $gambarLama;
  }else {
    $cover = upload();
  }
  // 4 === gagal upload gambar
  // 0 === berhasil upload gambar
  
  $queryUpdate = "UPDATE buku SET 
  cover = '$cover',
  id_buku = '$idBuku',
  kategori = '$kategoriBuku',
  judul = '$judulBuku',
  pengarang = '$pengarangBuku',
  penerbit = '$penerbitBuku',
  tahun_terbit = '$tahunTerbit',
  jumlah_halaman = $jumlahHalaman,
  buku_deskripsi = '$deskripsiBuku'
  WHERE id_buku = '$idBuku'
  ";
  
  mysqli_query($conn, $queryUpdate);
  return mysqli_affected_rows($conn);
}

// Hapus member yang terdaftar
function deleteMember($nisnMember) {
  global $conn;
  
  // Hapus data terkait di tabel peminjaman
  $deletePeminjaman = "DELETE FROM peminjaman WHERE nisn = $nisnMember";
  mysqli_query($conn, $deletePeminjaman);
  
  // Hapus data di tabel member
  $deleteMember = "DELETE FROM member WHERE nisn = $nisnMember";
  mysqli_query($conn, $deleteMember);
  
  return mysqli_affected_rows($conn);
}

// Hapus history pengembalian data BUKU
function deleteDataPengembalian($idPengembalian) {
  global $conn;
  
  $deleteDataPengembalianBuku = "DELETE FROM pengembalian WHERE id_pengembalian = $idPengembalian";
  mysqli_query($conn, $deleteDataPengembalianBuku);
  return mysqli_affected_rows($conn);
}


// === FUNCTION KHUSUS ADMIN END ===


// === FUNCTION KHUSUS MEMBER START ===
// Peminjaman BUKU
function pinjamBuku($dataBuku) {
  global $conn;
  
  $idBuku = $dataBuku["id_buku"];
  $nisn = $dataBuku["nisn"];
  $idAdmin = $dataBuku["id"];
  $tglPinjam = $dataBuku["tgl_peminjaman"];
  $tglKembali = $dataBuku["tgl_pengembalian"];
  // cek apakah user memiliki denda 
  $cekDenda = mysqli_query($conn, "SELECT denda FROM pengembalian WHERE nisn = $nisn && denda > 0");
  if(mysqli_num_rows($cekDenda) > 0) {
    $item = mysqli_fetch_assoc($cekDenda);
    $jumlahDenda = $item["denda"];
    if($jumlahDenda > 0) {
       echo "<script>
       alert('Anda belum melunasi denda, silahkan lakukan pembayaran terlebih dahulu !');
       </script>";
       return 0;
    }
  }
  // cek batas user meminjam buku berdasarkan nisn
  $nisnResult = mysqli_query($conn, "SELECT nisn FROM peminjaman WHERE nisn = $nisn");
  if(mysqli_fetch_assoc($nisnResult)) {
    echo "<script>
    alert('Anda sudah meminjam buku, Harap kembalikan dahulu buku yg anda pinjam!');
    </script>";
    return 0;
  }
  
  $queryPinjam = "INSERT INTO peminjaman VALUES(null, '$idBuku', $nisn, $idAdmin, '$tglPinjam', '$tglKembali')";
  mysqli_query($conn, $queryPinjam);
  return mysqli_affected_rows($conn);
}

// Pengembalian BUKU
function pengembalian($dataBuku) {
  global $conn;
  
  // Variabel pengembalian
  $idPeminjaman = $dataBuku["id_peminjaman"];
  $idBuku = $dataBuku["id_buku"];
  $nisn = $dataBuku["nisn"];
  $idAdmin = $dataBuku["id_admin"];
  $tenggatPengembalian = $dataBuku["tgl_pengembalian"];
  $bukuKembali = $dataBuku["buku_kembali"];
  $keterlambatan = $dataBuku["keterlambatan"];
  $denda = $dataBuku["denda"];
  
  if($bukuKembali > $tenggatPengembalian) {
    echo "<script>
    alert('Anda terlambat mengembalikan buku, harap bayar denda sesuai dengan jumlah yang ditentukan!');
    </script>";
  }
  
  // Menghapus data siswa yang sudah mengembalikan buku
  $hapusDataPeminjam = "DELETE FROM peminjaman WHERE id_peminjaman = $idPeminjaman";

  // Memasukkan data kedalam tabel pengembalian
  $queryPengembalian = "INSERT INTO pengembalian VALUES(null, $idPeminjaman, '$idBuku', $nisn, $idAdmin, '$bukuKembali', '$keterlambatan', $denda)";

  
  mysqli_query($conn, $hapusDataPeminjam);
  mysqli_query($conn, $queryPengembalian);
  return mysqli_affected_rows($conn);
}

function bayarDenda($data) {
  global $conn;
  $idPengembalian = $data["id_pengembalian"];
  $jmlDenda = $data["denda"];
  $jmlDibayar = $data["bayarDenda"];
  $calculate = $jmlDenda - $jmlDibayar;
  
  $bayarDenda = "UPDATE pengembalian SET denda = $calculate WHERE id_pengembalian = $idPengembalian";
  mysqli_query($conn, $bayarDenda);
  return mysqli_affected_rows($conn);
}

// === FUNCTION KHUSUS MEMBER END ===
?>


