<?php
require './query.php';

$tf_id = $_POST['tf_id'];
$namaFile = $_FILES['berkas']['name'];
$x = explode('.', $namaFile);
$ekstensiFile = strtolower(end($x));
$ukuranFile  = $_FILES['berkas']['size'];
$file_tmp = $_FILES['berkas']['tmp_name'];

// Lokasi Penempatan file
$dirUpload = "path/";
$linkPath = $dirUpload . $namaFile;

// Menyimpan file
$uploaded = move_uploaded_file($file_tmp, $linkPath);

$dataArr = array(
  'tf_id' => $tf_id,
  'title' => $namaFile,
  'size' => $ukuranFile,
  'ekstensi' => $ekstensiFile,
  'berkas' => $linkPath,
);

if ($uploaded && (insertData($dataArr) > 0)) {
  echo "Upload berhasil!";
  header("Location: /PBL/user/details-progress.php?tid=" . $_GET['tid'] . "&id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "", true, 301);
  exit();
} else {
  echo "Upload Gagal!";
  header("Location: /PBL/user/details-progress.php?tid=" . $_GET['tid'] . "&id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "&info=failed", true, 301);
  exit();
}
