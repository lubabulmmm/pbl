<?php

require './query.php';

$yt_url = $_POST['yt_url'];
$web_url = $_POST['web_url'];
$bunch_id = $_POST['bunch_id'];

// Laporan
$namaFileReport = $_FILES['report']['name'];
$x = explode('.', $namaFileReport);
$ekstensiFile = strtolower(end($x));
$ukuranFile  = $_FILES['report']['size'];
$file_tmp = $_FILES['report']['tmp_name'];

// Poster
$namaFilePoster = $_FILES['poster']['name'];
$xPoster = explode('.', $namaFilePoster);
$ekstensiFilePoster = strtolower(end($xPoster));
$ukuranFilePoster  = $_FILES['poster']['size'];
$file_tmp_poster = $_FILES['poster']['tmp_name'];

// Lokasi Penempatan file Report
$dirUpload = "submit-path/";
$linkPath = $dirUpload . $namaFileReport;

// Lokasi Penempatan file Poster
$dirUploadPoster = "submit-path/";
$linkPathPoster = $dirUpload . $namaFilePoster;

// Menyimpan file
$uploadedReport = move_uploaded_file($file_tmp, $linkPath);
$uploadedPoster = move_uploaded_file($file_tmp_poster, $linkPathPoster);

$dataArrReport = array(
  'bunch_id' => $bunch_id,
  'title' => $namaFileReport,
  'size' => $ukuranFile,
  'ekstensi' => $ekstensiFile,
  'report' => $linkPath,
);

$dataArrPoster = array(
  'bunch_id' => $bunch_id,
  'title' => $namaFilePoster,
  'size' => $ukuranFilePoster,
  'ekstensi' => $ekstensiFilePoster,
  'poster' => $linkPathPoster,
);

if ($uploadedReport && $uploadedPoster && (insertDataSubmitReport($dataArrPoster, $dataArrPoster['poster']) > 0) && (add_links($yt_url, $web_url, $bunch_id) > 0) && (insertDataSubmitReport($dataArrReport, $dataArrReport['report']) > 0)) {
  echo "Upload berhasil!";
  header("Location: /PBL/user/submit-projects.php?id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "", true, 301);
  exit();
} else {
  echo "Upload Gagal!";
  header("Location: /PBL/user/submit-projects.php?id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "&info=failed", true, 301);
  exit();
}
