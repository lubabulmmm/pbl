<?php

require './query.php';

$github_url = $_POST['github_url'];
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

// Video
$namaFileVideo = $_FILES['video']['name'];
$xVideo = explode('.', $namaFileVideo);
$ekstensiFileVideo = strtolower(end($xVideo));
$ukuranFileVideo  = $_FILES['video']['size'];
$file_tmp_video = $_FILES['video']['tmp_name'];

// Source Code
$namaFileSource = $_FILES['source']['name'];
$xSource = explode('.', $namaFileSource);
$ekstensiFileSource = strtolower(end($xSource));
$ukuranFileSource  = $_FILES['source']['size'];
$file_tmp_source = $_FILES['source']['tmp_name'];

// Lokasi Penempatan file Report
$dirUpload = "submit-path/report/";
$linkPath = $dirUpload . $namaFileReport;

// Lokasi Penempatan file Poster
$dirUploadPoster = "submit-path/poster/";
$linkPathPoster = $dirUploadPoster . $namaFilePoster;

// Lokasi Penempatan file Video
$dirUploadVideo = "submit-path/video/";
$linkPathVideo = $dirUploadVideo . $namaFileVideo;

// Lokasi Penempatan file Source Code
$dirUploadSource = "submit-path/source/";
$linkPathSource = $dirUploadSource . $namaFileSource;

// Menyimpan file
$uploadedReport = move_uploaded_file($file_tmp, $linkPath);
$uploadedPoster = move_uploaded_file($file_tmp_poster, $linkPathPoster);
$uploadedVideo = move_uploaded_file($file_tmp_video, $linkPathVideo);
$uploadedSource = move_uploaded_file($file_tmp_source, $linkPathSource);

$dataArrReport = array(
  'bunch_id' => $bunch_id,
  'title' => $namaFileReport,
  'size' => $ukuranFile,
  'ekstensi' => $ekstensiFile,
  'report' => $linkPath,
  'type' => 'report',
);

$dataArrPoster = array(
  'bunch_id' => $bunch_id,
  'title' => $namaFilePoster,
  'size' => $ukuranFilePoster,
  'ekstensi' => $ekstensiFilePoster,
  'poster' => $linkPathPoster,
  'type' => 'poster',
);

$dataArrSource = array(
  'bunch_id' => $bunch_id,
  'title' => $namaFileSource,
  'size' => $ukuranFileSource,
  'ekstensi' => $ekstensiFileSource,
  'source' => $linkPathSource,
  'type' => 'source',
);

$dataArrVideo = array(
  'bunch_id' => $bunch_id,
  'title' => $namaFileVideo,
  'size' => $ukuranFileVideo,
  'ekstensi' => $ekstensiFileVideo,
  'video' => $linkPathVideo,
  'type' => 'video',
);


if ($uploadedReport && $uploadedPoster && $uploadedVideo && $uploadedSource && (insertDataSubmitReport($dataArrPoster, $dataArrPoster['poster']) > 0) && (add_links($github_url, $web_url, $bunch_id) > 0) && (insertDataSubmitReport($dataArrSource, $dataArrSource['source']) > 0) && (insertDataSubmitReport($dataArrReport, $dataArrReport['report']) > 0) && (insertDataSubmitReport($dataArrVideo, $dataArrVideo['video']) > 0)) {
  echo "Upload berhasil!";
  header("Location: /PBL/user/submit-projects.php?id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "", true, 301);
  exit();
} else {
  echo "Upload Gagal!";
  header("Location: /PBL/user/submit-projects.php?id=" . $_GET['id'] . "&bid=" . $_GET['bid'] . "&info=failed", true, 301);
  exit();
}
